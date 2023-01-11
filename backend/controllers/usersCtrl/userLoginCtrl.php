<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once($path);
    });

    use App\Model\Users\UsersManage;
    use App\Exceptions\UsersExceptions\LoginExceptionsManage;

    function userLoginCtrl(): void
    {
        $login = new UsersManage();

        if(isset($_POST['email']) && isset($_POST['password'])) {

            $email = $login->getLoginData($_POST['email']);
            $password = $_POST['password'];

            if($email && password_verify($password, $email['f_password'])) {

                $_SESSION['pseudo'] = $email['f_pseudo'];
                $_SESSION['email'] = $email['f_email'];
                $_SESSION['id'] = $email['id'];
            }
           else {
               throw new LoginExceptionsManage(LoginExceptionsManage::ErrorLoginData().'('.$_POST['email']. ' / '.$password.')');
           }
        }
    }

