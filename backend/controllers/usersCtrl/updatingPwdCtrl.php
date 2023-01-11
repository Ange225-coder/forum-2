<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\Users\UsersManage;
    use App\Exceptions\UsersSettingExceptions\PasswordExceptionsManage;

    function updatingPwdCtrl(): void
    {
        /** instance for check if
         * password enter is the same
         * with password in db
         */
        $id = new UsersManage();

        $pwd_updating = new UsersManage();

        if(isset($_SESSION['id']) && $_SESSION['id'] > 0 && is_numeric($_SESSION['id'])) {
            $user_id = $id->getUserId($_SESSION['id']);

            if(isset($_POST['current_pass']) && isset($_POST['new_pass']) && isset($_POST['confirm_newPass'])) {
                $current_pass = $_POST['current_pass'];
                $new_pass = $_POST['new_pass'];
                $confirm_newPass = $_POST['confirm_newPass'];

                $pass_hashed = password_hash($new_pass, PASSWORD_DEFAULT);

                if($user_id && password_verify($current_pass, $user_id['f_password'])) {
                    if(preg_match('#^[a-zA-Z0-9/_@$. ]{6,16}$#', $new_pass)) {
                        if($new_pass !== $confirm_newPass) {
                            throw new PasswordExceptionsManage(PasswordExceptionsManage::errorSamePwd().'('.$new_pass.' / '.$confirm_newPass.')');
                        }
                        else {
                            $pwd_updating->updatingPwd($pass_hashed, $_SESSION['id']);
                        }
                    }
                    else {
                        throw new PasswordExceptionsManage(PasswordExceptionsManage::errorPwdFormat());
                    }
                }
                else {
                    throw new PasswordExceptionsManage(PasswordExceptionsManage::errorCurrentPwd().'('.$current_pass.')');
                }
            }
            else {
                throw new PasswordExceptionsManage(PasswordExceptionsManage::errorFieldsEmpty());
            }
        }
        else {
            throw new PasswordExceptionsManage(PasswordExceptionsManage::userIdNotExists());
        }
    }