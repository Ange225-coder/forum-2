<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../../'.$path);
    });

    use App\Model\AdminManager\GetRowForDeletionManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    function getConcernRowCtrl()
    {
        $get_concern_row = new GetRowForDeletionManage();

        if(isset($_GET['concern_id']) && $_GET['concern_id'] > 0 && is_numeric($_GET['concern_id'])) {
            $concern_id = $_GET['concern_id'];

            $get_row = $get_concern_row->getConcernRow($concern_id);
        }
        else {
            throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorUserIdNotExists());
        }

        return $get_row;
    }