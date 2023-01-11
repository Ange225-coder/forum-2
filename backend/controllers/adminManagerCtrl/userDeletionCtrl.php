<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\AdminManager\DeletionsManage;
    use App\Model\Admins\AdminsManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    function userDeletionCtrl(): void
    {
        $user_deletion = new DeletionsManage();
        $username = new AdminsManage();

        if(isset($_GET['user_id']) && $_GET['user_id'] > 0 && is_numeric($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            $admin_username  = $_SESSION['username'];

            if(isset($_POST['admin_pwd'])) {
                $admin_pwd = $_POST['admin_pwd'];
                $get_username = $username->getUsername($admin_username);

                if($get_username && password_verify($admin_pwd, $get_username['f_password'])) {

                    $user_deletion->userDeletion($user_id);
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