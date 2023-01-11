<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../../../'.$path);
    });

    use App\Model\DevConcerns\DevConcernsManage;

    function getAllDevConcernsCtrl(): array
    {
        $get_all_devConcerns = new DevConcernsManage();

        return $get_all_devConcerns->getAllDevConcerns();
    }