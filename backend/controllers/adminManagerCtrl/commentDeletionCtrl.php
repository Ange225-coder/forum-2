<?php

    declare(strict_types = 1);

    spl_autoload_register(function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\AdminManager\DeletionsManage;
    use App\Model\Admins\AdminsManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    function commentDeletionCtrl(): void
    {
        $comment_deletion = new DeletionsManage();
        $username = new AdminsManage();

        if(isset($_GET['comment_id']) && $_GET['comment_id'] > 0 && is_numeric($_GET['comment_id'])) {
            $comment_id = $_GET['comment_id'];
            $admin_username = $_SESSION['username'];

            if(isset($_POST['admin_pwd'])) {
                $admin_pwd = $_POST['admin_pwd'];
                $get_username = $username->getUsername($admin_username);

                if($get_username && password_verify($admin_pwd, $get_username['f_password'])) {

                    $comment_deletion->commentDeletion($comment_id);
                }
                else {
                    throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorAdminPwd());
                }
            }
            else {
                throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorFieldEmpty());
            }
        }
        else {
            throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorUserIdNotExists());
        }
    }