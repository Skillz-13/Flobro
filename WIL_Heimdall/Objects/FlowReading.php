<?php
class FlowReading{

    private $DBconnect;
    private $table_check = "tbl_arduino";
    private $table_second_check = "tbl_ard_fm";
    private $table_name = "tbl_log";

    public $ARD_IMEI_NUMBER;
    public $valid;
    public $ARD_FM_ID;


    //public $LOG_ENTRY;
    public $LOG_DATE;
    public $VOLUME;
    public $TEMPERATURE;
    public $PORT_NUMBER;

    public $contact_number;
    public $password;

    public function __construct($db){
        $this->DBconnect = $db;
    }

    function arduino_exists(){

        $query_1 = "SELECT *
            FROM " . $this->table_check . "
            WHERE ARD_IMEI_NUMBER = ?
            LIMIT 0,1";

        $stmt_1 = $this->DBconnect->prepare( $query_1 );

        // sanitize
        //$this->IMEI=htmlspecialchars(strip_tags($this->IMEI));

        //review this
        $this->ARD_IMEI_NUMBER= $this->ARD_IMEI_NUMBER;

        // bind given email value
        $stmt_1->bindParam(1, $this->ARD_IMEI_NUMBER);

        // execute the query
        $stmt_1->execute();

        // get number of rows
        $num = $stmt_1->rowCount();

        $query_2 = "SELECT *
            FROM " . $this->table_second_check . "
            WHERE ARD_IMEI_NUMBER = ?
            LIMIT 0,1";

        $stmt_2 = $this->DBconnect->prepare( $query_2 );
        $stmt_2->bindParam(1, $this->ARD_IMEI_NUMBER);
        $stmt_2->execute();
        $num_2 = $stmt_2->rowCount();

        if($num>0) {

            $first_check_row = $stmt_1->fetch(PDO::FETCH_ASSOC);
            $this->ARD_IMEI_NUMBER = $first_check_row['ARD_IMEI_NUMBER'];
            $this->valid = $first_check_row['VALID'];

            if($num_2 > 0) {

            $second_check_row = $stmt_2->fetch(PDO::FETCH_ASSOC);
            $this->ARD_FM_ID = $second_check_row['FM_ID'];
            echo ($this->ARD_FM_ID);
            echo "over here";
            return true;

            }

        }
        echo "not found";
        return false;
    }

    function create(){
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                LOG_DATE = :LOG_DATE,
                ARD_IMEI_NUMBER = :ARD_IMEI_NUMBER,
                PORT_NUMBER = :PORT_NUMBER,
                VOLUME = :VOLUME,
                TEMPERATURE = :TEMPERATURE ";

        $stmt = $this->DBconnect->prepare($query);

        //$this->date_time=htmlspecialchars(strip_tags($this->date_time));
        //$this->IMEI=htmlspecialchars(strip_tags($this->IMEI));
        //$this->port_number=htmlspecialchars(strip_tags($this->port_number));
        //$this->volume=htmlspecialchars(strip_tags($this->volume));
        //$this->temperature=htmlspecialchars(strip_tags($this->temperature));

        //$stmt->bindParam(':LOG_ENTRY', $this->LOG_ENTRY);
        $stmt->bindParam(':LOG_DATE', $this->LOG_DATE);
        $stmt->bindParam(':ARD_IMEI_NUMBER', $this->ARD_IMEI_NUMBER);
        $stmt->bindParam(':PORT_NUMBER', $this->PORT_NUMBER);
        $stmt->bindParam(':VOLUME', $this->VOLUME);
        $stmt->bindParam(':TEMPERATURE', $this->TEMPERATURE);

        if($stmt->execute()){
            echo "<pre>";
            $_GET = array();
            echo "</pre>";
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
