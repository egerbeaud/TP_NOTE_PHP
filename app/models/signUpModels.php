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

        return $ok;
    }

}