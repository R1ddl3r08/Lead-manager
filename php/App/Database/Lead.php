<?php

namespace Models;

use Database\Database;

class Lead {
    private $conn;
    private $table_name = "leads";

    public $first_name;
    public $last_name;
    public $email;
    public $mobile;

    public function __construct($first_name, $last_name, $email, $mobile) {
        $this->conn = Database::connect();
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->mobile = $mobile;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (first_name, last_name, email, mobile) VALUES (:first_name, :last_name, :email, :mobile)";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":first_name", $this->first_name);
        $stmt->bindParam(":last_name", $this->last_name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":mobile", $this->mobile);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

?>
