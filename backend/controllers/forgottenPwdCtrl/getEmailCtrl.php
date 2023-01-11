<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\ForgottenPwd\ForgottenPasswordManage;
    use App\Exceptions\ForgottenPwdExceptions\ForgottenPwdExceptionsManage;

    function getEmailCtrl(): void
    {
        $get_email = new ForgottenPasswordManage();

        if(isset($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);

            foreach($get_email->getEmails($email) as $checkForEmail) {
                if($email == $checkForEmail['f_email']) {

                    $_SESSION['email'] = $checkForEmail['f_email'];

                    header('Location: ../../../frontend/views/users/forgottenPwd/newPwdForms.php');

                }
                /** here the else is manage in the router */
            }
        }
        else {
            throw new ForgottenPwdExceptionsManage(ForgottenPwdExceptionsManage::errorFieldEmpty());
        }
    }