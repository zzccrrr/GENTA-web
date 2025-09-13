<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);

        // AUTHENTICATE
        $result = $this->Authentication->getResult();

        // VALIDATE AUTH RESULT
        if ($result && $result->isValid())
        {
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Dashboard',
                'action' => 'index',
                'prefix' => 'Teacher'
            ]);

            return $this->redirect($redirect);
        }

        // IF WRONG CREDENTIALS
        if ($this->request->is('post') && !$result->isValid())
        {
            $this->Flash->error(__('Invalid email or password.'));
        }
    }

    public function register()
    {
        $usersTable = $this->loadModel('Users');
        $user = $usersTable->newEmptyEntity();

        if ($this->request->is('post'))
        {
            $user = $usersTable->patchEntity($user, $this->request->getData());

            if (!$user->hasErrors())
            {
                if ($this->request->getData('password') === $this->request->getData('confirm_password'))
                {
                    if ($this->request->getData('terms_and_conditions'))
                    {
                        if ($usersTable->save($user))
                        {
                            $this->Flash->success(__('You successfully registered a new account!'));
                            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                        }

                    } else {

                        $this->Flash->error(__('You need to agree with the Terms and Conditions.'));
                    }

                } else {

                    $this->Flash->error(__('Confirm Password did not match the password.'));
                }
            }
        }

        $this->set(compact('user'));
    }

    public function logout()
    {
        // AUTHENTICATE
        $result = $this->Authentication->getResult();

        // VALIDATE AUTH RESULT
        if ($result && $result->isValid())
        {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
