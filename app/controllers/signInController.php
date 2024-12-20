<?php

class SignInController
{
    private PDO $pdo;
    private SignInModels $signInModels;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->signInModels = new SignInModels($pdo);
    }

    public function displaySignInUserForm()
    {
        require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'User' . DIRECTORY_SEPARATOR . 'signInForm.php');
    }

    public function connectUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
       
        $user = $this->signInModels->findUserInDB($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['password'] = $user['password'];
            header('Location: ?c=home');
            exit;
        } else { 
            require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' .DIRECTORY_SEPARATOR.'User'. DIRECTORY_SEPARATOR .'Message'.DIRECTORY_SEPARATOR.'connectUserFailed.php');
       }
    }

    public function signOutUser(){
        session_destroy();
        header('Location: ?c=home');
        exit;
    }
}
