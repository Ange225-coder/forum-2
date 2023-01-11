<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\Comments\CommentsManage;
    use App\Exceptions\CommentsExceptions\CommentsExceptionsManage;

    function getPostCommentsCtrl(): array
    {
        $getting_postComments = new CommentsManage();

        if(isset($_GET['idPost']) && $_GET['idPost'] > 0 && is_numeric($_GET['idPost'])) {
            $idPost = $_GET['idPost'];

            $get_postCom = $getting_postComments->getPostComments($idPost);
        }
        else {
            throw new CommentsExceptionsManage(CommentsExceptionsManage::errorIdPostNotExist());
        }

        return $get_postCom;
    }