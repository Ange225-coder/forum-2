<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Exceptions\UsersExceptions\RegistrationExceptionsManage;
    use App\Model\Users\UsersManage;

    function setNewUsersCtrl(): void
    {
        if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $pass_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $users = new UsersManage();

            /**
             * regex for username
             * and loop for checking if existing in db
             */
            if(preg_match('#^[a-z0-9@$_.]{4,}$#', $_POST['pseudo'])) {
                foreach($users->getUserData() as $checking_username) {
                    if($pseudo == $checking_username['f_pseudo']) {
                        throw new RegistrationExceptionsManage($_POST['pseudo'].RegistrationExceptionsManage::usernameError());
                    }
                }
            }
            else {
                throw new RegistrationExceptionsManage(RegistrationExceptionsManage::usernameFormatError());
            }

            /**
             * regex for email
             * and loop for checking if existing in db
             */
            if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $_POST['email'])) {
                foreach($users->getUserData() as $checking_email) {
                    if($email == $checking_email['f_email']) {
                        throw new RegistrationExceptionsManage(RegistrationExceptionsManage::emailError());
                    }
                }
            }
            else {
                throw new RegistrationExceptionsManage(RegistrationExceptionsManage::emailFormatError());
            }

            /**
             * regex for password
             */
            if(preg_match('#^[a-zA-Z0-9/_@$. ]{6,16}$#', $_POST['password'])) {
                if($_POST['password'] !== $_POST['pass_confirm']) {
                    throw new RegistrationExceptionsManage(RegistrationExceptionsManage::passwordError().'('. $_POST['password']. ' / '. $_POST['pass_confirm']. ')');
                }
                else {
                    $users->setNewUser($pseudo, $email, $pass_hashed);

                    $_SESSION['pseudo'] = $pseudo;
                    $_SESSION['email'] = $email;


                    /** loop for retrieve user id during registration */
                    foreach ($users->getUserData() as $get_user_id) {
                        $_SESSION['id'] = $get_user_id['id'];
                    }
                }
            }
            else {
                throw new RegistrationExceptionsManage(RegistrationExceptionsManage::passwordFormatError());
            }
        }
    }