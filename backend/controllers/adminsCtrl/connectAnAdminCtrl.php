<?php

    declare(strict_types = 1);

    spl_autoload_register(function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once($path);
    });

    use App\Model\Admins\AdminsManage;
    use App\Exceptions\AdminExceptions\AdminsExceptionsManage;

    function connectAnAdminCtrl(): void
    {
        $connect = new AdminsManage();

        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = $connect->getUsername($_POST['username']);
            $password = $_POST['password'];

            if($username && password_verify($password, $username['f_password'])) {

                $_SESSION['username'] = $username['f_username'];
            }
            else {
                throw new AdminsExceptionsManage(AdminsExceptionsManage::errorAdminUsernameFormat());
            }
        }
    }