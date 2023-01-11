<?php

    declare(strict_types = 1);

    spl_autoload_register(function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\ForgottenPwd\ForgottenPasswordManage;
    use App\Exceptions\ForgottenPwdExceptions\ForgottenPwdExceptionsManage;

    function setNewUserPwdCtrl(): void
    {
        $user_email = new ForgottenPasswordManage();

        if(isset($_POST['new_pwd']) && isset($_POST['confirm_new_pwd'])) {
            $new_pwd = $_POST['new_pwd'];
            $confirm_new_pwd = $_POST['confirm_new_pwd'];

            $email = $_SESSION['email'];

            if(preg_match('#^[a-zA-Z0-9/_@$. ]{6,16}$#', $new_pwd)){
                if ($new_pwd == $confirm_new_pwd) {
                    $new_pwd_hashed = password_hash($new_pwd, PASSWORD_DEFAULT);

                    $user_email->setNewUserPwd($new_pwd_hashed, $email);
                }
                else {
                    throw new ForgottenPwdExceptionsManage(ForgottenPwdExceptionsManage::errorSamePwd() . '(' . $new_pwd . ' / ' . $confirm_new_pwd . ')');
                }
            }
            else {
                throw new ForgottenPwdExceptionsManage(ForgottenPwdExceptionsManage::errorPwdFormat());
            }
        }
        else {
            throw new ForgottenPwdExceptionsManage(ForgottenPwdExceptionsManage::errorFieldEmpty());
        }
    }