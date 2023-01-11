<?php

    declare(strict_types = 1);

    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Model\Subjects\SubjectsManage;
    use App\Exceptions\SubjectsExceptions\SubjectExceptionsManage;

    function setNewSubjectCtrl(): void
    {
        $subject = new SubjectsManage();

        if(isset($_POST['theme']) && isset($_POST['description'])) {
            $theme = htmlspecialchars($_POST['theme']);
            $description = htmlspecialchars($_POST['description']);
            $id = $_SESSION['id'];
            $pseudo = $_SESSION['pseudo'];

            $subject->setNewSubject($id, $pseudo, trim($theme), trim($description));
        }
        else {
            throw new SubjectExceptionsManage(SubjectExceptionsManage::errorFieldEmpty());
        }
    }