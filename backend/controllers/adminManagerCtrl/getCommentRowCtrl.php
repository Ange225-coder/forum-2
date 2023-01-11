<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../../'.$path);
    });

    use App\Model\AdminManager\GetRowForDeletionManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    function getCommentRowCtrl()
    {
        $get_comment_row = new GetRowForDeletionManage();

        if(isset($_GET['comment_id']) && $_GET['comment_id'] > 0 && is_numeric($_GET['comment_id'])) {
            $comment_id = $_GET['comment_id'];

            $get_row = $get_comment_row->getCommentRow($comment_id);
        }
        else {
            throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorUserIdNotExists());
        }

        return $get_row;
    }