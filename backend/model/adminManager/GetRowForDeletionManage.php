<?php

    declare(strict_types = 1);

    namespace App\Model\AdminManager;

    use App\Model\Database\DbManage;

    class GetRowForDeletionManage extends DbManage
    {
        /**
         * function which get a row in
         * users table based on his user id
         */
        public function getUserRow(string $userId): array
        {
            $db = $this->dbConnect();
            $queryGetUserRow = $db->prepare('SELECT * FROM users WHERE id = ?');
            $queryGetUserRow->execute(array($userId));

            return $queryGetUserRow->fetch();
        }

        /**
         * function which get a row in
         * subjects table based on his id
         */
        public function getSubjectRow(string $subjectId)
        {
            $db = $this->dbConnect();
            $queryGetSubjectRow = $db->prepare('SELECT * FROM subjects WHERE id = ?');
            $queryGetSubjectRow->execute(array($subjectId));

            return $queryGetSubjectRow->fetch();
        }

        /**
         * function which get a row in
         * comments table based on his id
         */
        public function getCommentRow(string $commentId)
        {
            $db = $this->dbConnect();
            $queryGetCommentRow = $db->prepare('SELECT * FROM comments WHERE id = ?');
            $queryGetCommentRow->execute(array($commentId));

            return $queryGetCommentRow->fetch();
        }

        /**
         * function which get a row in
         * dev concern table based on his id
         */
        public function getConcernRow(string $concernId)
        {
            $db = $this->dbConnect();
            $queryGetConcernRow = $db->prepare('SELECT * FROM dev_concerns WHERE id = ?');
            $queryGetConcernRow->execute(array($concernId));

            return $queryGetConcernRow->fetch();
        }

        /**
         * function which get a row in
         * concern response table based on his id
         */
        public function getConcernResponseRow(string $responseId)
        {
            $db = $this->dbConnect();
            $queryGetConcernResponseRow = $db->prepare('SELECT * FROM concerns_responses WHERE id = ?');
            $queryGetConcernResponseRow->execute(array($responseId));

            return $queryGetConcernResponseRow->fetch();
        }
    }