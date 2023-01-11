<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\Comments\CommentsManage;
    use App\Exceptions\CommentsExceptions\CommentsExceptionsManage;

    function setNewCommentCtrl(): void
    {
        $set_comment = new CommentsManage();

        if(isset($_GET['idPost']) && $_GET['idPost'] > 0 && is_numeric($_GET['idPost'])) {
            $idPost = $_GET['idPost'];

            if(isset($_POST['comment']) && !empty($_POST['comment'])) {
                $comment = strip_tags($_POST['comment']);
                $author = $_SESSION['pseudo'];

                $set_comment->setNewComment($idPost, $author, $comment);
            }
            else {
                throw new CommentsExceptionsManage(CommentsExceptionsManage::errorFieldEmpty());
            }
        }
        else {
            throw new CommentsExceptionsManage(CommentsExceptionsManage::errorIdPostNotExist());
        }
    }