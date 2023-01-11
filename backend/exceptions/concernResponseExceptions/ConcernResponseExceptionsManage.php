<?php

    declare(strict_types = 1);

    namespace App\Exceptions\ConcernResponseExceptions;

    use RuntimeException;

    class ConcernResponseExceptionsManage extends RuntimeException
    {
        public static function errorFieldEmpty(): string
        {
            return 'Entrer une réponse';
        }


        public static function errorIdNotExist(): string
        {
            return 'Entrez l\'identifiant du Post pour poster une réponse';
        }
    }