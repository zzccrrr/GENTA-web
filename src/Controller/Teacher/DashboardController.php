<?php
declare(strict_types=1);

namespace App\Controller\Teacher;

use App\Controller\Teacher\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher;

/**
 * Dashboard Controller
 *
 * @method \App\Model\Entity\Teacher\Dashboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DashboardController extends AppController
{

    // STUDENT QUIZ LIST
    public function index()
    {
        $studentQuizTable = $this->loadModel('StudentQuiz');

        $studentQuizzes = $studentQuizTable->find('all', [
            'contain' => [
                'Students', 'Subjects', 'StudentQuizQuestions'
            ]
        ]);

        $this->set(compact('studentQuizzes'));
    }

    // STUDENT QUIZ DATA
    public function studentQuiz($studentQuizIDHash)
    {
        $studentQuizID = $this->Decrypt->hex($studentQuizIDHash);

        $studentQuizTable = $this->loadModel('StudentQuiz');

        $studentQuiz = $studentQuizTable->get($studentQuizID, [
            'contain' => [
                'Students', 'Subjects', 'StudentQuizQuestions'
            ]
        ]);

        $this->set(compact('studentQuiz'));
    }

    // STUDENT LIST
    public function students()
    {
        $studentsTable = $this->loadModel('Students');

        $students = $studentsTable->find('all');

        $this->set(compact('students'));
    }

    public function student($studentIDHash)
    {
        $studentID = $this->Decrypt->hex($studentIDHash);

        $studentsTable = $this->loadModel('Students');

        $student = $studentsTable->get($studentID, [
            'contain' => [
                'StudentQuiz.StudentQuizQuestions', 'StudentQuiz.Subjects'
            ]
        ]);

        if ($this->request->is('post'))
        {
            $student = $studentsTable->patchEntity($student, [
                'remarks' => $this->request->getData('remarks')
            ]);

            if ($studentsTable->save($student))
            {
                $this->Flash->success(__('Student details updated successfully!'));

            } else {

                $this->Flash->error(__('Error updating student details.'));
            }
        }

        $this->set(compact('student'));
    }

    public function questions()
    {
        $questionsTable = $this->loadModel('Questions');
        $subjectsTable = $this->loadModel('Subjects');

        // DROPDOWN SELECTIONS
        $subjectOptions = $subjectsTable->searchOptions();

        // QUESTIONS FILTERS
        $quesSubjectSel = $this->request->getQuery('questionsSubject') ?: 'All';
        $quesSubjectCond = $subjectsTable->searchSelection($quesSubjectSel);

        $questions = $questionsTable->find('all', [
            'conditions' => [
                'Questions.subject_id IN ' => $quesSubjectCond
            ],
            'contain' => [
                'Subjects'
            ]
        ]);

        $this->set(compact('quesSubjectSel', 'subjectOptions', 'questions'));
    }

    public function createEditQuestion($questionIDHash = NULL)
    {
        $questionsTable = $this->loadModel('Questions');
        $subjectsTable = $this->loadModel('Subjects');

        // DROPDOWN SELECTIONS
        $subjectOptions = $subjectsTable->searchOptions(false);

        if ($questionIDHash)
        {
            $questionID = $this->Decrypt->hex($questionIDHash);
            $question = $questionsTable->get($questionID);

        } else {

            $question = $questionsTable->newEmptyEntity();
        }

        if ($this->request->is('post'))
        {
            $question = $questionsTable->patchEntity($question, $this->request->getData());

            if (!$question->hasErrors())
            {
                if ($questionsTable->save($question))
                {
                    $this->Flash->success(__('Question saved!'));
                    return $this->redirect(['controller' => 'Dashboard', 'action' => 'questions', 'prefix' => 'Teacher']);

                } else {

                    $this->Flash->error(__('Error saving question.'));
                }
            }
        }

        $this->set(compact('subjectOptions', 'question'));
    }

    public function deleteQuestion($questionIDHash)
    {
        $questionID = $this->Decrypt->hex($questionIDHash);

        $questionsTable = $this->loadModel('Questions');

        $question = $questionsTable->get($questionID);
        $question->status = $questionsTable::STATUS_DELETED;

        if ($questionsTable->save($question))
        {
            $this->Flash->success(__('Question deleted successfully!'));

        } else {

            $this->Flash->error(__('Error deleting question.'));
        }

        return $this->redirect(['controller' => 'Dashboard', 'action' => 'questions', 'prefix' => 'Teacher']);
    }

    public function profile()
    {
        $userSession = $this->Authentication->getIdentity();

        $usersTable = $this->loadModel('Users');

        $user = $usersTable->get($userSession->id);

        if ($this->request->is('post'))
        {
            // PASSWORD BEFORE PATCH
            $oldPassword = $user->password;

            // PATCH AND CHECK FOR FIELD ERRORS
            $user = $usersTable->patchEntity($user, $this->request->getData());

            if (!$user->hasErrors())
            {
                if ($this->request->getData('submit') === 'profile')
                {
                    if ($usersTable->save($user))
                    {
                        $this->Flash->success(__('Profile changes saved!'));
                    }
                }

                if ($this->request->getData('submit') === 'password')
                {
                    $hasher = new DefaultPasswordHasher();
                    $currentPassword = $hasher->check($this->request->getData('current_password'), $oldPassword);

                    if ($currentPassword)
                    {
                        if ($this->request->getData('password') === $this->request->getData('confirm_password'))
                        {
                            if ($usersTable->save($user))
                            {
                                $this->Flash->success(__('Password updated!'));
                            }

                        } else {

                            $this->Flash->error(__('Confirm Password did not match your new password.'));
                        }

                    } else {

                        $this->Flash->error(__('Current Password did not match.'));
                    }
                }
            }
        }

        $this->set(compact('user'));
    }
}
