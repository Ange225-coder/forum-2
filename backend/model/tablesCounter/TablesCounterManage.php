<?php

    declare(strict_types = 1);

    namespace App\Model\TablesCounter;

    use App\Model\Database\DbManage;

    class TablesCounterManage extends DbManage
    {
        public function subjectsCounter(): array
        {
            $db = $this->dbConnect();
            $querySubjectCounter = $db->prepare('SELECT * FROM subjects');
            $querySubjectCounter->execute();

            return $querySubjectCounter->fetchAll();
        }


        public function concernCounter(): array
        {
            $db = $this->dbConnect();
            $queryConcernCounter = $db->prepare('SELECT * FROM dev_concerns');
            $queryConcernCounter->execute();

            return $queryConcernCounter->fetchAll();
        }


        public function suggestionCounter(): array
        {
            $db = $this->dbConnect();
            $querySuggestionCounter = $db->prepare('SELECT * FROM suggestions');
            $querySuggestionCounter->execute();

            return $querySuggestionCounter->fetchAll();
        }
    }

