<?php

    declare(strict_types = 1);

    namespace App\Model\DevConcerns;

    use App\Model\Database\DbManage;
    use App\Model\Pagination\PaginationsManage;

    class DevConcernsManage extends DbManage
    {
        /**
         * function which set new dev concerns
         */
        public function setDevConcerns(string $user, string $language, string $description, string $code): bool
        {
            $db = $this->dbConnect();
            $querySetDevConcerns = $db->prepare('INSERT INTO dev_concerns(f_user, f_language, f_description, f_code, concern_date) VALUES(?, ?, ?, ?, NOW()) ');

            return $querySetDevConcerns->execute(array($user, $language, $description, $code));
        }

        /**
         * function which get all dev concerns
         */
        public function getAllDevConcerns(): array
        {
            $db = $this->dbConnect();
            $queryGetDevConcerns = $db->prepare('SELECT *, DATE_FORMAT(concern_date, "%d/%m/%Y à %Hh:%imin:%ss") as date_concern_fr FROM dev_concerns ORDER BY concern_date DESC LIMIT '.getStartPagination().', '.PaginationsManage::$elt_by_page);
            $queryGetDevConcerns->execute();

            return $queryGetDevConcerns->fetchAll();
        }

        /**
         * function which get a concern
         * based on his id
         */
        public function getConcern(string $idConcern): array
        {
            $db = $this->dbConnect();
            $queryGetConcern = $db->prepare('SELECT * FROM dev_concerns WHERE id = ?');
            $queryGetConcern->execute(array($idConcern));

            return $queryGetConcern->fetch();
        }
    }