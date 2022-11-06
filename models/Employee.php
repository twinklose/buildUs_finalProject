<?php

require_once(__DIR__.'/../models/User.php');
require_once(__DIR__.'/../helpers/functions.php');

class Employee extends User {
    
    private $phone;
    private $income;
    private $adress;
    private $role;

    
    /**
     * Constructeur
     * @param string $firstname
     * @param string $lastname
     * @param string $email
     * @param string $phone
     * @param float $income
     * @param string|null $adress
     * @param int $role
     */
    public function __construct (string $firstname, string $lastname, string $email, string $phone, float $income, string $adress = null, int $role = 2) {
        parent::__construct($firstname, $lastname, $email);
        $this->phone = $phone;
        $this->income = $income;
        $this->adress = $adress;
        $this->role = $role;
    }

    /**
     * Récupération du téléphone
     * @return string
     */
    public function getPhone () :string {
        return $this->phone;
    }

    /**
     * Récupération du revenu
     * @return float
     */
    public function getIncome () :float {
        return $this->income;
    }

    /**
     * Récupération de l'adresse
     * @return string
     */
    public function getAdress () :string {
        return $this->adress;
    }

    /**
     * Récupération du rôle
     * @return int
     */
    public function getRole () :int {
        return $this->role;
    }

    /************************************** **************************************/
    /*********************************** CREATE **********************************/
    /************************************** **************************************/

    public function isExist () :bool {
        $databaseConnection = Database::getConnection();
        $query = $databaseConnection->prepare('SELECT * FROM users WHERE phone = :phone AND Id_role = 2 ;');
        $query->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? true : false;
    }

    public function add () :bool {
        $databaseConnection = Database::getConnection();
        $query = $databaseConnection->prepare('INSERT INTO users (firstname, lastname, email, phone, salaries, adress, Id_role) VALUES (:firstname, :lastname, :email, :phone, :income, :adress, :role) ;');
        $query->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
        $query->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
        $query->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
        $query->bindValue(':income', $this->getIncome(), PDO::PARAM_STR);
        $query->bindValue(':adress', $this->getAdress(), PDO::PARAM_STR);
        $query->bindValue(':role', $this->getRole(), PDO::PARAM_INT);
        $query->execute();
        if ($query->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /************************************** **************************************/
    /*********************************** READ ************************************/
    /************************************** **************************************/

    /**
     * Récupération du nombre de page totale pour la pagination
     * @return int
     */
    public static function howManyPages () :int {
        $databaseConnection = Database::getConnection();
        $query = $databaseConnection->prepare('SELECT COUNT(`Id_users`) as total FROM `users` WHERE Id_role = 2 ;');
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        $totalPages = intdiv($result->total, 10);
        if ($result->total % 10 > 0) {
            $totalPages++;
        }
        return $totalPages;
    }

    /**
     * Récupération du numéro de page en méthode GET
     * @return int
     */
    public static function whichPage () :int {
        if (isset($_GET['page'])) {
            $input = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
            if (validationInput($input, REGEX_PAGE) == true) {
                $page = $input;
            } else {
                $page = 1;
            }
        } else {
            $page = 1;
        }
        return intval($page, 10);
    }

    /**
     * Récupération de 10 employés par page
     * @return array
     */
    public static function getTen () :array {
        $databaseConnection = Database::getConnection();
        $query = $databaseConnection->prepare('SELECT `lastname`, `firstname`, `Id_users` FROM `users` WHERE Id_role = 2 ORDER BY `lastname` ASC LIMIT :numberPerPage OFFSET :offset ');
        $query->bindValue(':numberPerPage', 10, PDO::PARAM_INT);
        $query->bindValue(':offset', (Employee::whichPage() - 1) * 10, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Récupération de tous les employés
     * @return array
     */
    public static function getAll () :array {
        $databaseConnection = Database::getConnection();
        $query = $databaseConnection->prepare('SELECT `firstname`, `lastname`, `id` FROM users where Id_role = 2 ;');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    /**
     * Récupération d'un employé par son id
     * @param int $id
     * 
     * @return array
     */
    public static function getOne (int $id) :array {
        $databaseConnection = Database::getConnection();
        $query = $databaseConnection->prepare('SELECT * FROM users WHERE id = :id AND Id_role = 2 ;');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}