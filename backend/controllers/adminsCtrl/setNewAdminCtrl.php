<?php

    declare(strict_types = 1);

    spl_autoload_register(function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\Admins\AdminsManage;
    use App\Exceptions\AdminExceptions\AdminsExceptionsManage;

    function setNewAdminCtrl(): void
    {
        $set_admin = new AdminsManage();

        if(isset($_POST['username']) && isset($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = $_POST['password'];

            /**
             * regex for admin username and
             * check for if he already exists
             * in db
             */
            if(preg_match('#^(admin_)+([a-zA-Z0-9.@])+$#', $username)) {
                foreach($set_admin->getAdmins() as $admin) {
                    if($username == $admin['f_username']) {
                        throw new AdminsExceptionsManage(AdminsExceptionsManage::errorAdminAlreadyExist());
                    }
                }
            }
            else {
                throw new AdminsExceptionsManage(AdminsExceptionsManage::errorAdminUsernameFormat());
            }

            /** regex for password username */
            if(preg_match('#^(admin1)+[a-zA-Z0-9/_@$. ]{6,16}$#', $password)) {
                $password_hashed = password_hash($password, PASSWORD_DEFAULT);

                $set_admin->setNewAdmin($username, $password_hashed);

                $_SESSION['username'] = $username;
            }
            else {
                throw new AdminsExceptionsManage(AdminsExceptionsManage::errorAdminPwdFormat());
            }
        }
        else {
            throw new AdminsExceptionsManage(AdminsExceptionsManage::errorFieldsEmpty());
        }
    }