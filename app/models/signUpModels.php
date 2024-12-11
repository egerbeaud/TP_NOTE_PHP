<?php

class SignUpModels {

    private PDO $pdo;
    private SignUpController $signUpController;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function createUser($name, $email, $password){

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $requete = $this->pdo->prepare("INSERT INTO users (nom, email, password, date_inscription) VALUES (:name, :email, :password, NOW())");
        $requete->bindParam(':name', $name);
        $requete->bindParam(':email', $email);
        $requete->bindParam(':password', $hashedPassword);
        $ok =  $requete->execute();

        if($ok){
            require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' .DIRECTORY_SEPARATOR.'User'. DIRECTORY_SEPARATOR .'Message'.DIRECTORY_SEPARATOR.'saveUserSucces.php');
        }
        else {
            echo ("Error to save user !!!");
        }
    }

}