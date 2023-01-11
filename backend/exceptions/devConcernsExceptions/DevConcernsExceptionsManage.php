<?php

    declare(strict_types = 1);

    namespace App\Exceptions\DevConcernsExceptions;

    use RuntimeException;

    class DevConcernsExceptionsManage extends RuntimeException
    {
        public static function errorDataNotExists(): string
        {
            return 'Entrez le language utilisé, une description et du code pour poster votre problème';
        }

        /**
         * used in getConcernCtrl()
         */
        public static function errorIdNotExist(): string
        {
            return 'Entrer l\'identifiant de la préoccupation pour continuer';
        }
    }