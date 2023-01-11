<?php session_start();

    require_once('../controllers/usersCtrl/setNewUserCtrl.php');
    require_once('../controllers/usersCtrl/userLoginCtrl.php');
    require_once('../controllers/usersCtrl/updatingEmailCtrl.php');
    require_once('../controllers/usersCtrl/updatingPwdCtrl.php');
    require_once('../controllers/usersCtrl/deleteAccountCtrl.php');

    require_once('../controllers/subjectsCtrl/setNewSubjectCtrl.php');
    require_once('../controllers/commentsCtrl/setNewCommentCtrl.php');

    require_once('../controllers/devConcernsCtrl/setDevConcernsCtrl.php');
    require_once('../controllers/concernsResponseCtrl/setConcernResponseCtrl.php');

    require_once('../controllers/forgottenPwdCtrl/getEmailCtrl.php');
    require_once('../controllers/forgottenPwdCtrl/setNewUserPwdCtrl.php');

    require_once('../controllers/adminsCtrl/setNewAdminCtrl.php');
    require_once('../controllers/adminsCtrl/connectAnAdminCtrl.php');
    require_once('../controllers/adminsCtrl/setSuggestionCtrl.php');

    require_once('../controllers/adminManagerCtrl/userDeletionCtrl.php');
    require_once('../controllers/adminManagerCtrl/subjectDeletionCtrl.php');
    require_once('../controllers/adminManagerCtrl/commentDeletionCtrl.php');
    require_once('../controllers/adminManagerCtrl/concernDeletionCtrl.php');
    require_once('../controllers/adminManagerCtrl/concernResponseDeletionCtrl.php');




    spl_autoload_register(static function($fqcn): void {
        $path = str_replace(['App', '\\'], ['backend', '/'], $fqcn).'.php';
        require_once('../../'.$path);
    });

    use App\Exceptions\UsersExceptions\RegistrationExceptionsManage;
    use App\Exceptions\UsersExceptions\LoginExceptionsManage;
    use App\Exceptions\SubjectsExceptions\SubjectExceptionsManage;
    use App\Exceptions\UsersSettingExceptions\EmailExceptionsManage;
    use App\Exceptions\UsersSettingExceptions\PasswordExceptionsManage;
    use App\Exceptions\UsersSettingExceptions\DeletionExceptionsManage;
    use App\Exceptions\CommentsExceptions\CommentsExceptionsManage;
    use App\Exceptions\DevConcernsExceptions\DevConcernsExceptionsManage;
    use App\Exceptions\ConcernResponseExceptions\ConcernResponseExceptionsManage;
    use App\Exceptions\ForgottenPwdExceptions\ForgottenPwdExceptionsManage;
    use App\Exceptions\AdminExceptions\AdminsExceptionsManage;
    use App\Exceptions\AdminManagerExceptions\AdminManagerExceptionsManage;

    if(isset($_GET['action'])) {

        /** user registration manage */
        try {
            if($_GET['action'] == 'setNewUsersCtrl') {
                setNewUsersCtrl();

                header('Location: ../../frontend/views/users/homePage/memberHomePage.php');
            }
        }
        catch(RegistrationExceptionsManage $e) {
            $error_registration_msg = $e->getMessage();

            require_once('../../frontend/views/users/userRegistration/registration.php');
        }


        /** user login manage */
        try {
            if($_GET['action'] == 'userLoginCtrl') {
                userLoginCtrl();

                header('Location: ../../frontend/views/users/homePage/memberHomePage.php');
            }
        }
        catch(LoginExceptionsManage $e) {
            $error_login = $e->getMessage();

            require_once('../../frontend/views/users/userLogin/login.php');
        }


        /** create new subject manage */
        try {
            if($_GET['action'] == 'setNewSubjectCtrl') {
                setNewSubjectCtrl();

                header('Location: ../../frontend/views/users/subjects/subjectsList.php');
            }
        }
        catch(SubjectExceptionsManage $e) {
            $error_field_empty = $e->getMessage();

            require_once('../../frontend/views/users/subjects/newSubject.php');
        }


        /** updating email manage */
        try {
            if($_GET['action'] == 'updatingEmailCtrl') {
                updatingEmailCtrl();

                header('Location: ../../frontend/views/users/redirects/usersSettingRedirects/updatingEmailRedirect.php');
            }
        }
        catch(EmailExceptionsManage $e) {
            $error_updating_email = $e->getMessage();

            require_once('../../frontend/views/users/settings/usersSettings.php');
        }


        /** updating password manage */
        try {
            if($_GET['action'] == 'updatingPwdCtrl') {
                updatingPwdCtrl();

                header('Location: ../../frontend/views/users/redirects/usersSettingRedirects/updatingPwdRedirect.php');
            }
        }
        catch(PasswordExceptionsManage $e) {
            $error_updating_pwd = $e->getMessage();

            require_once('../../frontend/views/users/settings/usersSettings.php');
        }


        /** delete account manage */
        try {
            if($_GET['action'] == 'deleteAccountCtrl') {
                deleteAccountCtrl();

                header('location: ../../frontend/views/users/redirects/usersSettingRedirects/deleteAccountRedirect.php');
            }
        }
        catch(DeletionExceptionsManage $e) {
            $error_deletion = $e->getMessage();

            require_once('../../frontend/views/users/settings/delAccountForm.php');
        }


        /** set new comment manage */
        try {
            if($_GET['action'] == 'setNewCommentCtrl') {
                setNewCommentCtrl();

                header('Location: ../../frontend/views/users/subjects/displayResponsesToComments.php?idPost='.$_GET['idPost']);
            }
        }
        catch(CommentsExceptionsManage $e) {
            $error_set_comment = $e->getMessage();

            require_once('../../frontend/views/users/subjects/respondToSubject.php');
        }


        /** set new dev concerns manage */
        try {
            if($_GET['action'] == 'setDevConcernsCtrl') {
                setDevConcernsCtrl();

                header('Location: ../../frontend/views/users/subjects/devConcernsList.php');
            }
        }
        catch(DevConcernsExceptionsManage $e) {
            $error_concerns = $e->getMessage();

            require_once('../../frontend/views/users/subjects/devConcerns.php');
        }


        /** Set concern response manage */
        try {
            if($_GET['action'] == 'setConcernResponseCtrl') {
                setConcernResponseCtrl();

                header('Location: ../../frontend/views/users/subjects/displayConcernResponses.php?idConcern='.$_GET['idConcern']);
            }
        }
        catch(ConcernResponseExceptionsManage $e) {
            $error_response = $e->getMessage();

            require_once('../../frontend/views/users/subjects/respondToConcerns.php');
        }


        /**
         * email checkFor about password modification manage
         */
        try {
            if($_GET['action'] == 'getEmailCtrl') {
                getEmailCtrl();

                $email = htmlspecialchars($_POST['email']);

                throw new ForgottenPwdExceptionsManage($email.ForgottenPwdExceptionsManage::errorEmailNotExist());
            }
        }
        catch(ForgottenPwdExceptionsManage $e) {
            $error_user_email = $e->getMessage();

            require_once('../../frontend/views/users/forgottenPwd/emailForm.php');
        }


        /**
         * password modification about forgotten
         * password manage
         */
        try {
            if($_GET['action'] == 'setNewUserPwdCtrl') {
                setNewUserPwdCtrl();

                header('Location: ../../frontend/views/users/homePage/memberHomePage.php');
            }
        }
        catch(ForgottenPwdExceptionsManage $e) {
            $error_modification_pwd = $e->getMessage();

            require_once('../../frontend/views/users/forgottenPwd/newPwdForms.php');
        }


        /** admin registration manager */
        try {
            if($_GET['action'] == 'setNewAdminCtrl') {
                setNewAdminCtrl();

                header('Location: ../../frontend/views/admins/homePage/adminHomePage.php');
            }
        }
        catch(AdminsExceptionsManage $e) {
            $error_admin_registration = $e->getMessage();

            require_once('../../frontend/views/admins/adminRegistration/registration.php');
        }


        /** admin login manager */
        try {
            if($_GET['action'] == 'connectAnAdminCtrl') {
                connectAnAdminCtrl();

                header('Location: ../../frontend/views/admins/homePage/adminHomePage.php');
            }
        }
        catch(AdminsExceptionsManage $e) {
            $error_admin_login = $e->getMessage();

            require_once('../../frontend/views/admins/adminLogin/login.php');
        }


        /** delete user manager */
        try {
            if($_GET['action'] == 'userDeletionCtrl') {
                userDeletionCtrl();

                header('Location: ../../frontend/views/admins/redirects/deletionsRedirects/userDeletionRedirect.php');
            }
        }
        catch(AdminManagerExceptionsManage $e) {
             echo  $e->getMessage();

            //require_once('../../frontend/views/admins/adminManage/deletions/deleteUser.php');
        }


        /** delete subject manager */
        try {
            if($_GET['action'] == 'subjectDeletionCtrl') {
                subjectDeletionCtrl();

                header('Location: ../../frontend/views/admins/redirects/deletionsRedirects/subjectDeletionRedirect.php');
            }
        }
        catch(AdminManagerExceptionsManage $e) {
            echo $e->getMessage();

            //require_once('../../frontend/views/admins/adminManage/deletions/deleteSubject.php');
        }


        /** delete comment manager */
        try {
            if($_GET['action'] =='commentDeletionCtrl') {
                commentDeletionCtrl();

                header('Location: ../../frontend/views/admins/redirects/deletionsRedirects/commentDeletionRedirect.php');
            }
        }
        catch(AdminManagerExceptionsManage $e) {
            echo $e->getMessage();

            //require_once('../../frontend/views/admins/adminManage/deletions/deleteComment.php');
        }


        /** delete dev concern manager */
        try {
            if($_GET['action'] == 'concernDeletionCtrl') {
                concernDeletionCtrl();

                header('Location: ../../frontend/views/admins/redirects/deletionsRedirects/concernDeletionRedirect.php');
            }
        }
        catch(AdminManagerExceptionsManage $e) {
            echo $e->getMessage();

            //require_once('../../frontend/views/admins/adminManage/deletions/deleteConcern.php');
        }


        /** delete concern response manager */
        try {
            if($_GET['action'] == 'concernResponseDeletionCtrl') {
                concernResponseDeletionCtrl();

                header('Location: ../../frontend/views/admins/redirects/deletionsRedirects/concernResponseDeletionRedirect.php');
            }
        }
        catch(AdminManagerExceptionsManage $e) {
            echo $e->getMessage().'<br > page en maintenance faite ctrl et flèche gauche pour un retour';

            //require_once('../../frontend/views/admins/adminManage/deletions/deleteConcernResponse.php');
        }


        /** suggestion for admin manager */
        try {
            if($_GET['action'] == 'setSuggestionCtrl') {
                setSuggestionCtrl();

                header('location: ../../index.php');
            }
        }
        catch(AdminsExceptionsManage $e) {
            $error_suggestions = $e->getMessage();

            require_once('../../index.php');
        }
    }