<?php
require_once SRC . 'classes/Card.php';
require_once SRC . 'classes/Address.php';

class User {
    private $username;
    private $userID;
    private $email;
    private $phone;
    private $firstName;
    private $lastName;
    // CC Variables
    private $cards = array();
    private $addresses = array();

    public function __construct($username) {
        $this->username = $username;
        $this->initialize();
    }


    /**
     * Initializes some values of this user
     **/
    private function initialize() {
        global $con;
        $sql = "SELECT * FROM users WHERE username=?";
        
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $this->username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        if ($result->num_rows == 1) {
            $usr = $result->fetch_assoc();
            $this->userID = $usr['ID'];
            $this->email = $usr['email'];
            $this->firstName = $usr['first_name'];
            $this->lastName = $usr['last_name'];
            $this->phone = $usr['phone_number'];
        } else {
            return;
        }
        
        $this->loadAddresses();
        $this->loadCards();
    }


    /*
     * GETTERS
     */
    public function getUsername() {
        return $this->username;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getPhone(){
      return $this->phone;
    }

    public function getAddress(){
      return $this->addresses;
    }

    public function getCredit(){
      return $this->cards;
    }
    /**
     * Loads all addresses associated with this user from the database into this user object
     */
    public function loadAddresses() {
        global $con;
        $userID = $this->userID;
        $sql = "SELECT line1,line2,city,state,zipcode FROM addresses WHERE user_ID='$userID'";
        $result = $con->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($this->addresses, new Address($row['line1'], $row['line2'], $row['city'], $row['state'], $row['zipcode']));
            }
        }
    }

    /**
     * Loads all credit cards associated with this user into this user object
     */
    public function loadCards() {
        global $con;
        $userID = $this->userID;
        $sql = "SELECT number,exp_month,exp_year,cvv FROM credit_cards WHERE user_ID='$userID'";
        $result = $con->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($this->cards, new Card($row['number'], $row['exp_month'], $row['exp_year'], $row['cvv']));
            }
        }
    }
}
