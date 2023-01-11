<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../'.$path);
    });

    use App\Model\ConcernsResponses\ConcernsResponsesManage;
    use App\Exceptions\ConcernResponseExceptions\ConcernResponseExceptionsManage;

    function setConcernResponseCtrl(): void
    {
        $response = new ConcernsResponsesManage();

        if(isset($_GET['idConcern']) && $_GET['idConcern'] > 0 && is_numeric($_GET['idConcern'])) {
            $idConcern = $_GET['idConcern'];
            $author = $_SESSION['pseudo'];

            if(isset($_POST['concern_response'])) {
                $concern_response = htmlspecialchars($_POST['concern_response']);

                $response->setConcernResponse($idConcern, $author, $concern_response);
            }
            else {
                throw new ConcernResponseExceptionsManage(ConcernResponseExceptionsManage::errorFieldEmpty());
            }
        }
        else {
            throw new ConcernResponseExceptionsManage(ConcernResponseExceptionsManage::errorIdNotExist());
        }
    }