<?php

    declare(strict_types = 1);

    spl_autoload_register(function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../'.$path);
    });


    use App\Model\Users\UsersManage;
    use App\Model\TablesCounter\TablesCounterManage;
    use App\Model\ConcernsResponses\ConcernsResponsesManage;
    use App\Model\Comments\CommentsManage;


    function usersCounterCtrl(): int
    {
        $users_counter = new UsersManage();

        return count($users_counter->getUserData());
    }


    function subjectsCounterCtrl(): int
    {
        $subjects_counter = new TablesCounterManage();

        return count($subjects_counter->subjectsCounter());
    }


    function devConcernsCounterCtrl(): int
    {
        $concerns_counter = new TablesCounterManage();

        return count($concerns_counter->concernCounter());
    }


    function concernsResponsesCounterCtrl(): int
    {
        $concerns_response = new ConcernsResponsesManage();

        return count($concerns_response->getAllConcernResponses());
    }


    function commentsCounterCtrl(): int
    {
        $comment_counter = new CommentsManage();

        return count($comment_counter->getComments());
    }


    function suggestionCounterCtrl(): int
    {
        $suggestion_counter = new TablesCounterManage();

        return count($suggestion_counter->suggestionCounter());
    }