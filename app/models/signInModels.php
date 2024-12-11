<?php

class signInModels
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findUserInDB($email)
    {
        $requete = $this->pdo->prepare("SELECT * FROM tpnote.users WHERE email = :email");
        $requete->bindParam(':email', $email);
        $requete->execute();
        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}
