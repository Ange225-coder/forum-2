<?php

    declare(strict_types = 1);

    namespace App\Exceptions\UsersExceptions;

    use RuntimeException;

    class RegistrationExceptionsManage extends RuntimeException
    {

        public static function usernameError(): string
        {
            return ' existe déjà en base';
        }


        public static function usernameFormatError(): string
        {
            return 'Le format du nom de l\'utilisateur est incorrect (Ex: xyz.123)';
        }



        public static function emailError(): string
        {
            return 'L\'email existe déjà en base';
        }

        public static function emailFormatError(): string
        {
            return 'Format incorrect pour l\'email';
        }



        public static function passwordError(): string
        {
            return 'Les mots de passe ne correspondent pas ';
        }

        public static function passwordFormatError(): string
        {
            return "Le mot de passe contient surement des caractères incorrects .<br >Il doit contenir au minimum 6 caractères";
        }

    }