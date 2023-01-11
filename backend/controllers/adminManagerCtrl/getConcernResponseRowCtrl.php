<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../../'.$path);
    });

    use App\Model\AdminManager\GetRowForDeletionManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    function getConcernResponseRowCtrl()
    {
        $get_concernResponse_row = new GetRowForDeletionManage();

        if(isset($_GET['response_id']) && $_GET['response_id'] > 0 && is_numeric($_GET['response_id'])) {
            $response_id = $_GET['response_id'];

            $get_row = $get_concernResponse_row->getConcernResponseRow($response_id);
        }
        else {
            throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorUserIdNotExists());
        }

        return $get_row;
    }
