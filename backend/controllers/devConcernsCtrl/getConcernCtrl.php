<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../'.$path);
    });

    use App\Model\DevConcerns\DevConcernsManage;
    use App\Exceptions\DevConcernsExceptions\DevConcernsExceptionsManage;

    function getConcernCtrl(): array
    {
        $get_concern = new DevConcernsManage();

        if(isset($_GET['idConcern']) && $_GET['idConcern'] > 0 && is_numeric($_GET['idConcern'])) {
            $id_concern = $_GET['idConcern'];

            $getting_concern = $get_concern->getConcern($id_concern);
        }
        else {
            throw new DevConcernsExceptionsManage(DevConcernsExceptionsManage::errorIdNotExist());
        }

        return $getting_concern;
    }