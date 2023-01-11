<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../'.$path);
    });

    use App\Model\Subjects\SubjectsManage;

    function getAllSubjectCtrl(): array
    {
        $get_subjects = new SubjectsManage();

        return $get_subjects->getAllSubject();
    }