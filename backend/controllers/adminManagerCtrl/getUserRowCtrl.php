<?php

    declare(strict_types = 1);

    spl_autoload_register(function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../../'.$path);
    });


    use App\Model\AdminManager\GetRowForDeletionManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    function getUserRowCtrl(): array
    {
        $get_user_row = new GetRowForDeletionManage();

        if(isset($_GET['user_id']) && $_GET['user_id'] > 0 && is_numeric($_GET['user_id'])) {
            $user_id = $_GET['user_id'];

            $get_row = $get_user_row->getUserRow($user_id);
        }
        else {
            throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorUserIdNotExists());
        }

        return $get_row;
    }