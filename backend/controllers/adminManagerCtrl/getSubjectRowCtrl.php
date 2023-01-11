<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../../'.$path);
    });

    use App\Model\AdminManager\GetRowForDeletionManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    function getSubjectRowCtrl()
    {
        $get_subject_row = new GetRowForDeletionManage();

        if(isset($_GET['subject_id']) && $_GET['subject_id'] > 0 && is_numeric($_GET['subject_id'])) {
            $subject_id = $_GET['subject_id'];

            $get_row = $get_subject_row->getSubjectRow($subject_id);
        }
        else {
            throw new AdminManagerExceptionsManage(AdminManagerExceptionsManage::errorUserIdNotExists());
        }

        return $get_row;
    }