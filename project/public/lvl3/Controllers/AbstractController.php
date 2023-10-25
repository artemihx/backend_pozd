<?php

namespace Controllers;

use Models\User\UsersAuthService;
use View\View;
use Models\User\User;
abstract class AbstractController
{
    protected View $view;
    protected ?User $user;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../templates');
        $this->view->setVar('user',$this->user);
    }
}
