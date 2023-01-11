<?php

    declare(strict_types = 1);

    namespace App\Exceptions\AdminExceptions;

    use RuntimeException;

    class AdminsExceptionsManage extends RuntimeException
    {
        public static function errorAdminAlreadyExist(): string
        {
            return 'Cet administrateur existe déjà. Veuillez changer d\'identifiant';
        }


        public static function errorAdminUsernameFormat(): string
        {
            return 'Administrateur invalide';
        }


        public static function errorAdminPwdFormat(): string
        {
            return 'Mot de passe administrateur invalide';
        }


        public static function errorFieldsEmpty(): string
        {
            return 'Entrez un nom d\'utilisateur et un mot de passe pour continuer';
        }


        public static function errorPhoneNumber(): string
        {
            return 'Le format du numéro mobile est incorrect. Eg: +225 12 13 14 15 16';
        }


        public static function errorSuggestionFields(): string
        {
            return 'Remplissez les champs pour poster une suggestion';
        }


        public static function errorFullName(): string
        {
            return 'Le format du nom complet est incorrect. Eg: Ange Emmanuel';
        }


        public static function errorEmail(): string
        {
            return 'Entrez un email au format correct';
        }
    }