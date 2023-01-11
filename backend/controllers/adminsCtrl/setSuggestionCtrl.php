<?php

    declare(strict_types = 1);

    spl_autoload_register(function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\Admins\AdminsManage;
    use App\Exceptions\AdminExceptions\AdminsExceptionsManage;

    function setSuggestionCtrl(): void
    {
        $set_suggestion = new AdminsManage();

        if(isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['suggestion']) && isset($_POST['phone'])) {
            $full_name = htmlspecialchars($_POST['full_name']);
            $email = htmlspecialchars($_POST['email']);
            $suggestion = htmlspecialchars($_POST['suggestion']);
            $phone = $_POST['phone'];

            /** regex for full name */
            if(preg_match('#^[A-Za-z ]+$#', $full_name)) {

                /** regex for email */
                if(preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $email)){

                    /** regex fof phone number */
                    if(preg_match('#^[+|0{2} ]+[0-9 ]{1,3}[0-9 ]{4,}$#', $phone)) {

                        $set_suggestion->setSuggestion($full_name, $email, $phone, $suggestion);
                    }
                    else {
                        throw new AdminsExceptionsManage(AdminsExceptionsManage::errorPhoneNumber());
                    }
                }
                else {
                    throw new AdminsExceptionsManage(AdminsExceptionsManage::errorEmail());
                }
            }
            else {
                throw new AdminsExceptionsManage(AdminsExceptionsManage::errorFullName());
            }
        }
        else {
            throw new AdminsExceptionsManage(AdminsExceptionsManage::errorSuggestionFields());
        }
    }