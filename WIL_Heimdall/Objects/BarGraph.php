<?php

class BarGraph
{

    public function generateGraph($USER_ID, $START_DATE, $END_DATE)
    {

        $connect = mysqli_connect("localhost", "root", "", "bostoczw_test");

        // Query to get the data

        $initialisationQuery =
            "SELECT BEER_NAME, SUM(VOLUME) FROM `tbl_log`
             JOIN tbl_flowmeter on tbl_flowmeter.PORT_NUMBER = tbl_log.PORT_NUMBER
             JOIN tbl_beer_fm on tbl_beer_fm.FM_ID = tbl_flowmeter.FM_ID
             JOIN tbl_beer on tbl_beer.BEER_ID = tbl_beer_fm.BEER_ID
             WHERE tbl_flowmeter.FM_ID IN 
             (SELECT FM_ID FROM `tbl_ard_fm` WHERE ARD_IMEI_NUMBER IN
             (SELECT ARD_IMEI_NUMBER FROM `tbl_arduino_location` 
             JOIN tbl_assignment on tbl_assignment.LOCATION_ID = tbl_arduino_location.LOCATION_ID 
             WHERE USER_ID = $USER_ID AND VALID = 1)) AND LOG_DATE BETWEEN $START_DATE AND $END_DATE
             GROUP BY BEER_NAME";


// Assigning the queries to variables
        $data= mysqli_query($connect, $initialisationQuery);


// Creating the arrays for the final graph table and the subsequent Rows to populate the table
        $table = array();
        $rows = array();

// Naming and type matching the required columns
        $table['cols'] = array();

// Dynamically getting the required number of line names based on what is connected to the arduino
        while ($row = mysqli_fetch_array($data)) {

            array_push($table['cols'],

                array(
                    'label' => $row["BEER_NAME"],
                    'type' => 'number'
                )

            );

        }



// Populating the rows with the pouring data
        while ($datarow = mysqli_fetch_array($data)) {

            $sub_array = array();

            $sub_array[] =  array(
                "v" => $datarow["SUM(VOLUME)"]
            );

            // Adding the temporary row to the final row array
            $rows[] = array(
                "c" => $sub_array
            );
        }
        // Populating the final table with the completed generated rows
        $table['rows'] = $rows;

        //Casting the table to a json table to be used by the google api
        $jsonTable = json_encode($table);

        return $jsonTable;
    }
}

