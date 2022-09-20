<?php

class Sql
{
    // private string $serverName = "localhost";
    // private string $userName = "root";
    // private string $userPassword = "";
    // private string $database = "filrouge";
    // private object $connexion;

    private static string $serverName = "localhost";
    private static string $userName = "root";
    private static string $userPassword = "";
    private static string $database = "filrouge";
    private static object $connexion;

    public function __construct()
    {
        // try {
        //     $this->connexion = new PDO("mysql:host=$this->serverName;dbname=$this->database", $this->userName, $this->userPassword);
        //     $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // } catch (PDOException $e) {
        //     die("Erreur : " . $e->getMessage());
        // }
    }

    public static function connexionPDO()
    {
        try {
            self::$connexion = new PDO("mysql:host=" . self::$serverName . ";dbname=" . self::$database, self::$userName, self::$userPassword);
            self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }
    }

    public static function inserer(string $query): bool
    {
        self::connexionPDO();
        try {
            $etat = self::$connexion->exec($query);
        } catch (PDOException $e) {
            $etat = false;
        } finally {
            return $etat;
        }
    }

    public static function recup(string $query): array
    {
        self::connexionPDO();
        return self::$connexion->query($query)->fetchAll();
    }

    //     public function __destruct()
    //     {
    //         if (isset($this->connexion)) {
    //             $this->connexion = null;
    //         }
    //     }
}
