<?php

    declare(strict_types = 1);

    namespace App\Model\AdminManager;

    use App\Model\Database\DbManage;

    class DeletionsManage extends DbManage
    {
        /**
         * function which delete
         * user based on his id
         */
        public function userDeletion(string $user_id): bool
        {
            $db = $this->dbConnect();
            $queryUserDeletion = $db->prepare('DELETE FROM users WHERE id = ?');

            return $queryUserDeletion->execute(array($user_id));
        }

        /**
         * function which delete
         * a subject based on his id
         */
        public function subjectDeletion(string $subject_id): bool
        {
            $db = $this->dbConnect();
            $querySubjectDelete = $db->prepare('DELETE FROM subjects WHERE id = ?');

            return $querySubjectDelete->execute(array($subject_id));
        }

        /**
         * function which delete
         * a comment based on his id
         */
        public function commentDeletion(string $comment_id): bool
        {
            $db = $this->dbConnect();
            $queryCommentDeletion = $db->prepare('DELETE FROM comments WHERE id = ?');

            return $queryCommentDeletion->execute(array($comment_id));
        }

        /**
         * function which delete
         * a dev concern based on his id
         */
        public function concernDeletion(string $concern_id): bool
        {
            $db = $this->dbConnect();
            $queryCommentDeletion = $db->prepare('DELETE FROM dev_concerns WHERE id = ?');

            return $queryCommentDeletion->execute(array($concern_id));
        }

        /**
         * function which delete
         * a concern response based on his id
         */
        public function concernResponseDeletion(string $response_id): bool
        {
            $db = $this->dbConnect();
            $queryCommentDeletion = $db->prepare('DELETE FROM concerns_responses WHERE id = ?');

            return $queryCommentDeletion->execute(array($response_id));
        }
    }