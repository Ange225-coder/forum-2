<?php

    declare(strict_types = 1);

    namespace App\Model\Admins;

    use App\Model\Database\DbManage;

    class AdminsManage extends DbManage
    {
        /**
         * function which get all admin in db
         */
        public function getAdmins(): array
        {
            $db = $this->dbConnect();
            $queryGetAdmin = $db->prepare('SELECT * FROM admins');
            $queryGetAdmin->execute();

            return $queryGetAdmin->fetchAll();
        }

        /**
         * function which set new admin
         * in db
         */
        public function setNewAdmin(string $username, string $password): bool
        {
            $db = $this->dbConnect();
            $querySetNewAdmin = $db->prepare('INSERT INTO admins(f_username, f_password, registration_date) VALUE(?, ?, NOW())');

            return $querySetNewAdmin->execute(array($username, $password));
        }

        /**
         * function which get email and
         * check for if the admin password
         * associate is right
         */
        public function getUsername(string $username)
        {
            $db = $this->dbConnect();
            $queryGetEmail = $db->prepare('SELECT * FROM admins WHERE f_username = ?');
            $queryGetEmail->execute(array($username));

            return $queryGetEmail->fetch(\PDO::FETCH_ASSOC);
        }

        /**
         * function which set a new suggestions
         * for admin
         */
        public function setSuggestion(string $full_name, string $email,  string $phone, string $suggestion): bool
        {
            $db = $this->dbConnect();
            $querySetSuggestion = $db->prepare('INSERT INTO suggestions(full_name, s_email, s_phone, s_suggestion, suggestion_date) VALUES (?, ?, ?, ?, NOW())');

            return $querySetSuggestion->execute(array($full_name, $email, $phone, $suggestion));
        }
    }