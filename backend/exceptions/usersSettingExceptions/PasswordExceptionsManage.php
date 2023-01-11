<?php

    declare(strict_types = 1);

    namespace App\Exceptions\UsersSettingExceptions;

    use RuntimeException;

    class PasswordExceptionsManage extends RuntimeException
    {
        public static function errorSamePwd(): string
        {
            return 'La confirmation du nouveau mot de passe a échoué ';
        }

        public static function errorCurrentPwd(): string
        {
            return 'Le mot de passe actuel ne correspond pas ';
        }

        public static function errorFieldsEmpty(): string
        {
            return 'Remplissez les champs du formulaire pour continuer la mise à jour';
        }

        public static function userIdNotExists(): string
        {
            return 'Impossible de faire la mise à jour, user id inexistant';
        }

        public static function errorPwdFormat(): string
        {
            return 'Le format du mot de passe est incorrect';
        }

    }