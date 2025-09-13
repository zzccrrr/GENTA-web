<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentQuiz Entity
 *
 * @property int $id
 * @property int $student_id
 * @property int $subject_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Student $student
 * @property \App\Model\Entity\Subject $subject
 */
class StudentQuiz extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'student_id' => true,
        'subject_id' => true,
        'created' => true,
        'modified' => true,
        'student' => true,
        'subject' => true,
    ];

    protected function _getScore()
    {
        $score = [
            'studentScore' => 0,
            'totalScore' => 0,
            'overallScore' => 'N/A',
            'percentage' => 0
        ];

        if ($this->student_quiz_questions)
        {
            foreach ($this->student_quiz_questions as $question)
            {
                $score['totalScore'] += $question->score;

                if ($question->is_correct)
                {
                    $score['studentScore'] += $question->score;
                }
            }

            $score['overallScore'] = $score['studentScore'] . '/' . $score['totalScore'];

            $score['percentage'] = round(($score['studentScore'] / $score['totalScore']) * 100);
        }

        return $score;
    }
}
