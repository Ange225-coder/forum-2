<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\DevConcerns\DevConcernsManage;
    use App\Exceptions\DevConcernsExceptions\DevConcernsExceptionsManage;

    function setDevConcernsCtrl(): void
    {
        $dev_concern = new DevConcernsManage();

        if(isset($_POST['language_used']) && isset($_POST['description']) && isset($_POST['code'])) {
            $language_used = htmlspecialchars($_POST['language_used']);
            $description = htmlspecialchars($_POST['description']);
            $code = $_POST['code'];

            $user = $_SESSION['pseudo'];

            $dev_concern->setDevConcerns($user, $language_used, $description, trim($code));
        }
        else {
            throw new DevConcernsExceptionsManage(DevConcernsExceptionsManage::errorDataNotExists());
        }
    }