<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../'.$path);
    });

    use App\Model\Subjects\SubjectsManage;
    use App\Exceptions\SubjectsExceptions\SubjectExceptionsManage;

    function getPostCtrl(): array
    {
        $getting = new SubjectsManage();

        if(isset($_GET['idPost']) && $_GET['idPost'] > 0 && is_numeric($_GET['idPost'])) {
            $getting_post = $getting->getPost($_GET['idPost']);
        }
        else {
            throw new SubjectExceptionsManage(SubjectExceptionsManage::errorIdPost());
        }

        return $getting_post;
    }