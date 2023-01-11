<?php

    declare(strict_types = 1);

    namespace App\Exceptions\ForgottenPwdExceptions;

    use RuntimeException;

    class ForgottenPwdExceptionsManage extends RuntimeException
    {
        public static function errorEmailNotExist(): string
        {
            return ' n\'existe pas en base';
        }


        public static function errorFieldEmpty(): string
        {
            return 'Remplir le champs pour continuer';
        }


        public static function errorSamePwd(): string
        {
            return 'Les mots de passe ne correspondent pas ';
        }


        public static function errorPwdFormat(): string
        {
            return 'Le format du nouveau mot de passe est invalid Ex: xyz2_0';
        }
    }