<?php

    declare(strict_types = 1);

    use App\Model\Pagination\PaginationsManage;

    function getCurrentPage()
    {
        if(isset($_GET['current_page'])) {
            PaginationsManage::$current_page = $_GET['current_page'];
        }


        if(!isset(PaginationsManage::$current_page)) {
            PaginationsManage::$current_page = 1;
        }

        return PaginationsManage::$current_page;
    }


    function getStartPagination(): int
    {
        return (getCurrentPage() - 1) * PaginationsManage::$elt_by_page;
    }

    /** function is used for user pagination */
    function getLinksNumberForSubjectsPagination(): float
    {
        $get_subjectsLink = new PaginationsManage();

        return ceil($get_subjectsLink->getSubjectsPagination() / PaginationsManage::$elt_by_page);
    }


    function getLinksNumberForConcernsPagination(): float
    {
        $get_concernLink = new PaginationsManage();

        return ceil($get_concernLink->getConcernPagination() / PaginationsManage::$elt_by_page);
    }


    function getLinksNumberForUsersPagination(): float
    {
        $get_userLink = new PaginationsManage();

        return ceil($get_userLink->getUserPagination() / PaginationsManage::$elt_by_page);
    }

    /** function is used for admins pagination */
    function getLinksNumberForSubjectPagination(): float
    {
        $get_subjectLink = new PaginationsManage();

        return ceil($get_subjectLink->getSubjectsPagination() / PaginationsManage::$elt_by_page);
    }


    function getLinksNumberForCommentsPagination(): float
    {
        $get_commentLink = new PaginationsManage();

        return ceil($get_commentLink->getCommentPagination() / PaginationsManage::$elt_by_page);
    }


    function getLinksNumberForConcernsResponsesPagination(): float
    {
        $get_responsesLink = new PaginationsManage();

        return ceil($get_responsesLink->getConcernsResponsesPagination() / PaginationsManage::$elt_by_page);
    }


    function getLinksNumberForSuggestionsPagination(): float
    {
        $get_suggestionsLink = new PaginationsManage();

        return ceil($get_suggestionsLink->getSuggestionsPagination() / PaginationsManage::$elt_by_page);
    }