<?php

    declare(strict_types = 1);

    namespace App\Model\Subjects;

    use App\Model\Database\DbManage;
    use App\Model\Pagination\PaginationsManage;


    class SubjectsManage extends DbManage
    {
        /**
         * function which set new subject
         */
        public function setNewSubject(string $user_id, string $user_pseudo, string $theme, string $description): bool
        {
            $db = $this->dbConnect();
            $querySetNewSubject = $db->prepare('INSERT INTO subjects(user_id, user_pseudo, f_theme, f_description, subject_registration_date) VALUES(?, ?, ?, ?, NOW())');

            return $querySetNewSubject->execute(array($user_id, $user_pseudo, $theme, $description));
        }

        /**
         * function which retrieve all
         * subject since db
         */
        public function getAllSubject(): array
        {
            $db = $this->dbConnect();
            $queryGetAllSubject = $db->prepare('SELECT *, DATE_FORMAT(subject_registration_date, "%d/%m/%Y à %Hh:%imin:%ss") as dateFr FROM subjects ORDER BY subject_registration_date DESC LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $queryGetAllSubject->execute();
            $getting_subject = $queryGetAllSubject->fetchAll();

            if(count($getting_subject) == 0) {
                header('Location: ../../../frontend/views/users/subjects/subjectsList.php');
            }

            return $getting_subject;
        }

        /**
         * function which retrieved
         * one post in subject table
         * based on his id
         */
        public function getPost(string $idPost): array
        {
            $db = $this->dbConnect();
            $queryGetOnePost = $db->prepare('SELECT * FROM subjects WHERE id = ?');
            $queryGetOnePost->execute(array($idPost));

            return $queryGetOnePost->fetch();
        }
    }