<?php

    declare(strict_types = 1);

    namespace App\Exceptions\CommentsExceptions;

    use RuntimeException;

    class CommentsExceptionsManage extends RuntimeException
    {
        public static function errorFieldEmpty(): string
        {
            return 'Pour poster le commentaire, remplir le champs';
        }

        public static function errorIdPostNotExist(): string
        {
            return 'Identifiant du post inexistant, impossible d\'afficher ce thème';
        }
    }