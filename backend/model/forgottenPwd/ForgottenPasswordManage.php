<?php

    declare(strict_types = 1);

    namespace App\Model\ForgottenPwd;

    use App\Model\Database\DbManage;

    class ForgottenPasswordManage extends DbManage
    {
        /**
         * function which get email
         * in db
         */
        public function getEmails(string $email): array
        {
            $db = $this->dbConnect();
            $queryGetEmail = $db->prepare('SELECT f_email FROM users WHERE f_email = ?');
            $queryGetEmail->execute(array($email));

            return $queryGetEmail->fetchAll();
        }

        /**
         * function which modify user password
         * based on its email
         */
        public function setNewUserPwd(string $password, string $email): bool
        {
            $db = $this->dbConnect();
            $querySetNewUserPwd = $db->prepare('UPDATE users SET f_password = ? WHERE f_email = ?');

            return $querySetNewUserPwd->execute(array($password, $email));
        }
    }