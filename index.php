<?php
ob_start();
session_start();

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'connectDb.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'signUpModels.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . 'signInModels.php');

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'header.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'signUpController.php');
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'signInController.php');


if (!isset($_GET['c'])) {
    require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'home.php');
} else {
    switch ($_GET['c']) {

        case 'home':
            require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR . 'homeController.php');
            break;

        case 'signUpUser':
            $signUpController = new SignUpController($pdo);
            $signUpController->displaySignUpUserForm();
            break;

        case 'saveUser':
            $signUpController = new SignUpController($pdo);
            $signUpController->collectDataFormSignUp();
            break;

        case 'signInUser':
            $signInController = new SignInController($pdo);
            $signInController->displaySignInUserForm();
            break;

        case 'connectUser':
            $signInController = new SignInController($pdo);
            $signInController->connectUser();
            break;

        case 'signOut':
            $signInController = new SignInController($pdo);
            $signInController->signOutUser();
            break;
    }
}




require_once(__DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'footer.php');

ob_end_flush();
