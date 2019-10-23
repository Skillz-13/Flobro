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

    function create(){

        // to get time stamp for 'created' field
        //$this->created=date('Y-m-d H:i:s');

        // insert query
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                FIRST_NAME  = :FIRST_NAME ,
                SURNAME = :SURNAME,
                CONTACT_NUMBER = :CONTACT_NUMBER,
                EMAIL = :EMAIL,
                PASSWORD = :PASSWORD,
                ROLE_ID = :ROLE_ID,
                VALID = :VALID";

        // prepare the query
        $stmt = $this->DBconnect->prepare($query);

        // sanitize
        $this->first_name=htmlspecialchars(strip_tags($this->first_name));
        $this->surname=htmlspecialchars(strip_tags($this->surname));
        $this->contact_number=htmlspecialchars(strip_tags($this->contact_number));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->role_id=htmlspecialchars(strip_tags($this->role_id));
        $this->valid=htmlspecialchars(strip_tags($this->valid));

        // bind the values
        $stmt->bindParam(':FIRST_NAME', $this->first_name);
        $stmt->bindParam(':SURNAME', $this->surname);
        $stmt->bindParam(':CONTACT_NUMBER', $this->contact_number);
        $stmt->bindParam(':EMAIL', $this->email);
        $stmt->bindParam(':PASSWORD', $this->password);
        $stmt->bindParam(':ROLE_ID', $this->role_id);
        $stmt->bindParam(':VALID', $this->valid);

        // hash the password before saving to database
        //$password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        //$stmt->bindParam(':password', $password_hash);

        //$stmt->bindParam(':access_level', $this->access_level);
        //$stmt->bindParam(':status', $this->status);
        //$stmt->bindParam(':created', $this->created);

        // execute the query, also check if query was successful
        if($stmt->execute()){
            return true;
        }else{
            $this->showError($stmt);
            return false;
        }

    }
    public function showError($stmt){
        echo "<pre>";
        print_r($stmt->errorInfo());
        echo "</pre>";
    }
}
