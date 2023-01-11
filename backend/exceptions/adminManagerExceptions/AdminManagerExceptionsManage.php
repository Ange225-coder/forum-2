<?php

    declare(strict_types = 1);

    namespace App\Exceptions\AdminManagerExceptions;

    use RuntimeException;

    class AdminManagerExceptionsManage extends RuntimeException
    {
        public static function errorUserIdNotExists(): string
        {
            return 'Impossible de supprimer cette utilisateur, identifiant inexistant';
        }

        public static function errorAdminPwd(): string
        {
            return 'Mot de passe incorrect';
        }

        public static function errorFieldEmpty(): string
        {
            return 'Entrez votre mot de passe administrateur';
        }
    }