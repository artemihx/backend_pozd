<?php

namespace Controllers;

use Exceptions\InvalidArgumentException;
use Models\User\User;
use Models\User\UserActivationService;
use Models\User\UsersAuthService;
use Services\EmailSender;
use View\View;

class UsersController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../templates');
    }

    public function signUp()
    {
        if (!empty($_POST))
        {
            try
            {
                $user = User::signUp($_POST);
            }
            catch (InvalidArgumentException $e)
            {
                $this->view->renderHtml('users/signUp.php', ['error'=> $e->getMessage()]);
                return;
            }
            if($user instanceof User)
            {
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация','userActivation.php',[
                    'userId' => $user->getId(),
                    'code' => $code
                ]);

                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
        }
        $this->view->renderHtml('users/signUp.php');
    }

    public function login()
    {
        if (!empty($_POST))
        {
            try
            {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            }
            catch (InvalidArgumentException $e)
            {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('users/login.php');
    }
}