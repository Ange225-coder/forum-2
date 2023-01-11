<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../'.$path);
    });

    use App\Model\AdminManager\TablesListManage;


    function getUsersTableCtrl(): array
    {
        $users_table = new TablesListManage();

        return $users_table->getUsersTable();
    }


    function getSubjectsTableCtrl(): array
    {
        $subjects_table = new TablesListManage();

        return $subjects_table->getSubjectsTable();
    }


    function getDevConcernsTableCtrl(): array
    {
        $devConcerns_table = new TablesListManage();

        return $devConcerns_table->getConcernsTable();
    }


    function getConcernsResponsesTableCtrl(): array
    {
        $concern_response = new TablesListManage();

        return $concern_response->getConcernsResponseTable();
    }


    function getCommentsTableCtrl(): array
    {
        $comments_table = new TablesListManage();

        return $comments_table->getCommentsTable();
    }


    function getSuggestionsCtrl(): array
    {
        $suggestion_table = new TablesListManage();

        return $suggestion_table->getSuggestionsTable();
    }