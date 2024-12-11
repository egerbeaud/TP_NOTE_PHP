<?php
class signUpController {

    private PDO $pdo;
    private SignUpModels $signUpModels;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->signUpModels = new SignUpModels($pdo);
    }

    public function collectDataFormSignUp(){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $this->signUpModels->createUser($name, $email, $password);    }

    public function displaySignUpUserForm(){
        require_once(__DIR__. DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'signUpForm.php');
    }

    public function displaySignInUserForm(){
        require_once(__DIR__. DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'User'.DIRECTORY_SEPARATOR.'signInForm.php');

    }

}