<<<<<<< HEAD
<?php
include_once "Objects/Users.php";
include "GateKeeper.php";
include "libs/Utils.php";
    echo "working";

        $dbh;

        $email = $_POST['email'];

        try {
            $dbh = new PDO("mysql:host=localhost;dbname=bostoczw_Test", "bostoczw_Matt", "TestScript");
            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        $query = "SELECT EMAIL FROM tbl_user WHERE EMAIL = ?";
        $stmt = $dbh->prepare( $query );
        $stmt->bindParam(1, $email);
        $stmt->execute();

        $emails = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($emails == 0){

            $insert_query = "INSERT INTO tbl_users (FIRST_NAME, SURNAME, CONTACT_NUMBER, EMAIL, PASSWORD, ROLE_ID, VALID) VALUES (?,?,?,?,?,?,?)";
            $stmt= $dbh->prepare($insert_query);
            $first_name = $_POST['first_name'];
            $surname = $_POST['surname'];
            $contact_number = $_POST['contact_number'];
            $password = $_POST['password'];
            $role_id = $_POST['role_id'];
            $valid = 1;

            echo "<pre>";
            echo ($first_name);
            echo ($surname);
            echo ($contact_number);
            echo ($password);
            echo($role_id);
            echo ($valid);
            echo "</pre>";

            $stmt->execute([$first_name, $surname, $contact_number, $password, $role_id,$valid]);

        }



        /*$newUser->first_name=$_POST['txtBoxName'];
        $newUser->surname=$_POST['txtBoxSurname'];
        $newUser->contact_number=$_POST['contact_number'];

        $newUser->password = $_POST['password'];
        //$newUser->role_id = $_POST['taskOption'];
        $newUser->role_id = $_POST['ddlUserType'];
        $newUser->valid = 1;
        /*$_SESSION['user_id'] = $currentUser->user_id;
        $_SESSION['role_id'] = $currentUser->role_id;
        $_SESSION['valid'] = $currentUser->valid;
        $_SESSION['firstname'] = htmlspecialchars($currentUser->first_name, ENT_QUOTES, 'UTF-8');
        $_SESSION['surname'] = $currentUser->surname;

        if($newUser->create()){
            //$_POST=array();
        }else{
            //echo "<div class='alert alert-danger' role='alert'>Unable to register. Please try again.</div>";
        }*/

?>