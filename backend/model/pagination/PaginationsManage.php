<?php

    declare(strict_types = 1);

    namespace App\Model\Pagination;

    use App\Model\Database\DbManage;

    class PaginationsManage extends DbManage
    {
        /**
         * variable which manage subject by page and
         * dev concern by page
         */
        public static int $elt_by_page = 3;

        /** variable which contain current page */
        public static $current_page = null;

        /** get subject table for pagination */
        public function getSubjectsPagination()
        {
            $db = $this->dbConnect();
            $queryGetSubjectsPagination = $db->prepare('SELECT COUNT(*) as subject FROM subjects');
            $queryGetSubjectsPagination->execute();
            $subject_counter = $queryGetSubjectsPagination->fetchAll();

            return $subject_counter[0]['subject'];
        }

        /** get dev concern table for pagination */
        public function getConcernPagination()
        {
            $db = $this->dbConnect();
            $queryGetConcernPagination = $db->prepare('SELECT COUNT(*) as concern FROM dev_concerns');
            $queryGetConcernPagination->execute();
            $concern_counter = $queryGetConcernPagination->fetchAll();

            return $concern_counter[0]['concern'];
        }

        /** get users table for pagination */
        public function getUserPagination()
        {
            $db = $this->dbConnect();
            $queryGetUserPagination = $db->prepare('SELECT COUNT(*) as user FROM users');
            $queryGetUserPagination->execute();
            $user_counter = $queryGetUserPagination->fetchAll();

            return $user_counter[0]['user'];
        }

        /** get subject table for pagination */
        public function getCommentPagination()
        {
            $db = $this->dbConnect();
            $queryGetCommentPagination = $db->prepare('SELECT COUNT(*) as com FROM comments');
            $queryGetCommentPagination->execute();
            $subject_counter = $queryGetCommentPagination->fetchAll();

            return $subject_counter[0]['com'];
        }

        /** get concerns responses table for pagination */
        public function getConcernsResponsesPagination()
        {
            $db = $this->dbConnect();
            $queryGetConcernsResponses = $db->prepare('SELECT COUNT(*) as response FROM concerns_responses');
            $queryGetConcernsResponses->execute();
            $response_counter = $queryGetConcernsResponses->fetchAll();

            return $response_counter[0]['response'];
        }

        /** get suggestions pagination */
        public function getSuggestionsPagination()
        {
            $db = $this->dbConnect();
            $queryGetSuggestionsPagination = $db->prepare('SELECT COUNT(*) as suggestion FROM suggestions');
            $queryGetSuggestionsPagination->execute();
            $suggestion_counter = $queryGetSuggestionsPagination->fetchAll();

            return $suggestion_counter[0]['suggestion'];
        }

    }