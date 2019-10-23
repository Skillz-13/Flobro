<?php
// 'user' object
class Users{

    // database connection and table name
    private $DBconnect;
    private $table_name = "tbl_user";

    // object properties
    public $user_id;
    public $first_name;
    public $surname;
    public $email;
    public $contact_number;
    public $password;
    //public $access_level;
    public $role_id;
    public $valid;

    // constructor
    public function __construct($db){
        $this->DBconnect = $db;
    }

    // check if given email exist in the database
    function emailExists(){

        // query to check if email exists
        $query = "SELECT *
            FROM " . $this->table_name . "
            WHERE email = ?
            LIMIT 0,1";

        // prepare the query
        $stmt = $this->DBconnect->prepare( $query );

        // sanitize
        $this->email=htmlspecialchars(strip_tags($this->email));

        // bind given email value
        $stmt->bindParam(1, $this->email);

        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if($num>0){

            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->user_id = $row['USER_ID'];
            $this->first_name = $row['FIRST_NAME'];
            $this->surname = $row['SURNAME'];
            $this->contact_number = $row['CONTACT_NUMBER'];
            $this->email = $row['EMAIL'];
            $this->password = $row['PASSWORD'];
            $this->role_id = $row['ROLE_ID'];
            $this->valid = $row['VALID'];

            // return true because email exists in the database
            return true;
        }

        // return false if email does not exist in the database
        return false;
    }

}
