<?php

return [
    '~^hello/(.*)$~' => [\Controllers\MainController::class, 'sayHello'],
    '~^bye/(.*)$~' => [\Controllers\MainController::class, 'sayBye'],
    '~^articles/(\d+)/edit$~' => [\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)/comments$~' => [\Controllers\ArticlesController::class, 'comment'],
    '~^comments/(\d+)/edit~' => [\Controllers\ArticlesController::class, 'commentEdit'],
    '~^articles/(\d+)/delete$~' => [\Controllers\ArticlesController::class, 'delete'],
    '~^articles/add$~' => [\Controllers\ArticlesController::class, 'add'],
    '~^articles/(\d+)$~' => [\Controllers\ArticlesController::class, 'view'],
    '~^users/register$~' => [\Controllers\UsersController::class, 'signUp'],
    '~^users/logout$~' => [\Controllers\UsersController::class, 'logout'],
    '~^users/login$~' => [\Controllers\UsersController::class, 'login'],
    '~^$~' => [\Controllers\MainController::class, 'main'],
];