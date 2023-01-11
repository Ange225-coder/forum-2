<?php

    declare(strict_types = 1);

    namespace App\Exceptions\SubjectsExceptions;

    use RuntimeException;

    class SubjectExceptionsManage extends RuntimeException
    {
        public static function errorFieldEmpty(): string
        {
            return 'Les champs du formulaire ne doivent pas être vident';
        }

        /**
         * function which throw an exception
         * for getPostCtrl()
         */
        public static function errorIdPost():string
        {
            return 'Entrer l\'identifiant du post pour écrire votre commentaire';
        }
    }