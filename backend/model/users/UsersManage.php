<?php

    declare(strict_types = 1);

    namespace App\Model\Users;

    use App\Model\Database\DbManage;

    class UsersManage extends DbManage
    {
        /**
         * function which get pseudo and email
         * in db for checking if existing them
         *
         * using as well to manage user login
         */
        public function getUserData(): array
        {
            $db = $this->dbConnect();
            $queryGetUsersData = $db->prepare('SELECT * FROM users');
            $queryGetUsersData->execute();

            return $queryGetUsersData->fetchAll();
        }

        /**
         * function which insert new user
         * in db
         */

        public function setNewUser(string $pseudo, string $email, string $password): bool
        {
            $db = $this->dbConnect();
            $queryInsertUser = $db->prepare('INSERT INTO users(f_pseudo, f_email, f_password, registration_date) VALUES(?, ?, ?, NOW()) ');

            return $queryInsertUser->execute(array($pseudo, $email, $password));
        }

        /**
         * function which get one user email and
         * check for in the controller with this
         * retrieved email, if the associate pwd is correct
         */
        public function getLoginData(string $email)
        {
            $db = $this->dbConnect();
            $queryGetLoginData = $db->prepare('SELECT * FROM users WHERE f_email = ?');
            $queryGetLoginData->execute(array($email));

            return $queryGetLoginData->fetch(\PDO::FETCH_ASSOC);
        }

        /**
         * function that updates user's email
         * based on user id
         */
        public function updatingEmail(string $email, string $id): bool
        {
            $db = $this->dbConnect();
            $queryUpdatingEmail = $db->prepare('UPDATE users SET f_email = ? WHERE id = ?');

            return $queryUpdatingEmail->execute(array($email, $id));
        }

        /**
         * function which retrieved user's id
         * and which will to serve to updatingPwd()
         * and to allow to manage the 2nd parameter
         * of password_verify() in updatingPwnCtrl
         *
         * using as well for delete user's account
         */
        public function getUserId(string $id)
        {
            $db = $this->dbConnect();
            $queryGetUserId = $db->prepare('SELECT * FROM users WHERE id = ?');
            $queryGetUserId->execute(array($id));

            return $queryGetUserId->fetch(\PDO::FETCH_ASSOC);
        }

        /**
         * function that update user's password
         * based on his email
         */
        public function updatingPwd(string $pwd, string $id): bool
        {
            $db = $this->dbConnect();
            $queryUpdatingPwd = $db->prepare('UPDATE users SET f_password = ? WHERE id = ?');

            return $queryUpdatingPwd->execute(array($pwd, $id));
        }

        /**
         * function which delete user based on
         * his id
         */
        public function deleteAccount(string $id): bool
        {
            $db = $this->dbConnect();
            $queryDelUserAccount = $db->prepare('DELETE FROM users WHERE id = ?');

            return $queryDelUserAccount->execute(array($id));
        }

    }