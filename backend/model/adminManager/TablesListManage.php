<?php

    declare(strict_types = 1);

    namespace App\Model\AdminManager;

    use App\Model\Database\DbManage;
    use App\Model\Pagination\PaginationsManage;

    class TablesListManage extends DbManage
    {
        /**
         * function which get all users
         * in herself table
         */
        public function getUsersTable(): array
        {
            $db = $this->dbConnect();
            $queryUsersTable = $db->prepare('SELECT * FROM users ORDER BY registration_date DESC LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $queryUsersTable->execute();
            $getting_usersTable = $queryUsersTable->fetchAll();

            if(count($getting_usersTable) == 0) {
                header('Location: ../../../frontend/views/admins/tablesList/usersList.php');
            }

            return $getting_usersTable;
        }


        /**
         * function which get all subjects
         * in herself table
         */
        public function getSubjectsTable(): array
        {
            $db = $this->dbConnect();
            $querySubjectsTable = $db->prepare('SELECT * FROM subjects LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $querySubjectsTable->execute();
            $getting_subjectsTable = $querySubjectsTable->fetchAll();

            if(count($getting_subjectsTable) == 0) {
                header('location: ../../frontend/views/admins/tablesList/subjectsList.php');
            }

            return $getting_subjectsTable;
        }

        /**
         * function which get all dev concern
         * in herself table
         */
        public function getConcernsTable(): array
        {
            $db = $this->dbConnect();
            $queryConcernsTable = $db->prepare('SELECT * FROM dev_concerns LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $queryConcernsTable->execute();
            $getting_concern = $queryConcernsTable->fetchAll();

            if(count($getting_concern) == 0) {
                header('location: ../../frontend/views/admins/tablesList/devConcernList.php');
            }

            return $getting_concern;
        }

        /**
         * function which get all concerns response
         * in herself table
         */
        public function getConcernsResponseTable(): array
        {
            $db = $this->dbConnect();
            $queryConcernsResponses = $db->prepare('SELECT * FROM concerns_responses LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $queryConcernsResponses->execute();
            $getting_responses = $queryConcernsResponses->fetchAll();

            if(count($getting_responses) == 0) {
                header('location: ../../frontend/views/admins/tablesList/concernsResponsesList.php');
            }

            return $getting_responses;
        }

        /**
         * function which get all comments
         * in herself table
         */
        public function getCommentsTable(): array
        {
            $db = $this->dbConnect();
            $queryCommentsTable = $db->prepare('SELECT * FROM comments LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $queryCommentsTable->execute();
            $getting_comment = $queryCommentsTable->fetchAll();

            if(count($getting_comment) == 0) {
                header('location: ../../frontend/views/admins/tablesList/commentsList.php');
            }

            return $getting_comment;
        }

        /**
         * function which get all suggestions
         * in herself table
         */
        public function getSuggestionsTable(): array
        {
            $db = $this->dbConnect();
            $queryGetSuggestionsTable = $db->prepare('SELECT * FROM suggestions ORDER BY suggestion_date DESC LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $queryGetSuggestionsTable->execute();
            $getting_suggestion = $queryGetSuggestionsTable->fetchAll();

            if(count($getting_suggestion) == 0) {
                header('location: ../../frontend/views/admins/tableList/suggestionsList.php');
            }

            return $getting_suggestion;
        }
    }