<?php

    declare(strict_types=1);

    namespace App\Exceptions\UsersSettingExceptions;

    use RuntimeException;

    class EmailExceptionsManage extends RuntimeException
    {
        public static function emailAlreadyExists(): string
        {
            return ' existe déjà en base, veuillez choisir un autre identifiant';
        }

        public static function emailNotExist(): string
        {
            return 'Email inexistant entrez l\'email pour continuer la mise à jour';
        }

        public static function userIdNotExists(): string
        {
            return 'Impossible de faire la mise à jour, user id inexistant';
        }

        public static function errorEmailFormat(): string
        {
            return 'Le format de l\'email est incorrect';
        }
    }