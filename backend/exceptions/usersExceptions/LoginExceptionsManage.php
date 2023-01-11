<?php

    declare(strict_types = 1);

    namespace App\Exceptions\UsersExceptions;

    use RuntimeException;

    class LoginExceptionsManage extends RuntimeException
    {
        public static function ErrorLoginData(): string
        {
            return 'Les données de connexions ne correspondent pas ';
        }
    }