<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\Users\UsersManage;
    use App\Exceptions\UsersSettingExceptions\DeletionExceptionsManage;

    function deleteAccountCtrl(): void
    {
        /** instance for check if
         * password enter is the same
         * with password in db
         */
        $id = new UsersManage();

        $deletion = new UsersManage();

        if(isset($_SESSION['id']) && $_SESSION['id'] > 0 && is_numeric($_SESSION['id'])) {
            $user_id = $id->getUserId($_SESSION['id']);

            if(isset($_POST['currentPwd'])) {
                $current_pass = $_POST['currentPwd'];

                if($user_id && password_verify($current_pass, $user_id['f_password'])) {
                    $deletion->deleteAccount($_SESSION['id']);

                    session_destroy();
                }
                else {
                    throw new DeletionExceptionsManage(DeletionExceptionsManage::errorCurrentPwd());
                }
            }
            else {
                throw new DeletionExceptionsManage(DeletionExceptionsManage::errorFieldEmpty());
            }
        }
        else {
            throw new DeletionExceptionsManage(DeletionExceptionsManage::userIdNotExists());
        }
    }