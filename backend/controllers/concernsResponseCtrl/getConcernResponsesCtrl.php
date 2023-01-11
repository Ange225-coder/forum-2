<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\ConcernsResponses\ConcernsResponsesManage;
    use App\Exceptions\ConcernResponseExceptions\ConcernResponseExceptionsManage;

    function getConcernResponsesCtrl(): array
    {
        $get_concern_responses = new ConcernsResponsesManage();

        if(isset($_GET['idConcern']) && $_GET['idConcern'] > 0 && is_numeric($_GET['idConcern'])) {
            $idConcern = $_GET['idConcern'];

            $responses = $get_concern_responses->getConcernResponses($idConcern);
        }

        else {
            throw new ConcernResponseExceptionsManage(ConcernResponseExceptionsManage::errorIdNotExist());
        }

        return $responses;
    }