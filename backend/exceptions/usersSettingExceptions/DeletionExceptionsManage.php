<?php

    declare(strict_types = 1);

    namespace App\Exceptions\UsersSettingExceptions;

    use RuntimeException;

    class DeletionExceptionsManage extends RuntimeException
    {
        public static function errorCurrentPwd(): string
        {
            return 'Mot de passe incorrect, impossible de supprimer le compte';
        }

        public static function errorFieldEmpty(): string
        {
            return 'Pour supprimer le compte, entrez un mot de passe dans le champs';
        }

        public static function userIdNotExists(): string
        {
            return 'Impossible de supprimer le compte, user id inexistant';
        }
    }