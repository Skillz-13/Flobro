<?php
class Graph{

    function generateGraph($IMEI, $START_DATE, $END_DATE){

        $connect = mysqli_connect("localhost", "root", "", "bostoczw_test");

        // Query to get all the specific beer type each flowmeter connected to the arduino
        $headingQuery =
            "SELECT  PORT_NUMBER, BEER_NAME FROM `tbl_arduino` 
             JOIN tbl_beer_fm on tbl_arduino.FM_ID = tbl_beer_fm.FM_ID
             Join tbl_flowmeter on tbl_flowmeter.FM_ID = tbl_beer_fm.FM_ID
             JOIN tbl_beer on tbl_beer_fm.BEER_ID = tbl_beer.BEER_ID
             WHERE ARD_IMEI_NUMBER = $IMEI
             BETWEEN $START_DATE AND $END_DATE
             ORDER BY PORT_NUMBER ";

        // Query to get all pouring data for the specific arduino between the specified time
        $dataQuery =
            "SELECT PORT_NUMBER , 
             UNIX_TIMESTAMP(CONCAT_WS(\" \", DATE(LOG_DATE), TIME(LOG_DATE))) AS datetime , 
             VOLUME FROM tbl_log WHERE ARD_IMEI_NUMBER = $IMEI
             ORDER BY PORT_NUMBER ";

        // Assigning the queries to variables
        $headings = mysqli_query($connect, $headingQuery);

        $data = mysqli_query($connect, $dataQuery);

        // Creating the arrays for the final graph table and the subsequent Rows to populate the table
        $table = array();
        $rows = array();

        // Naming and type matching the required columns
        $table['cols'] = array(

            array(
                'label' => 'Time',
                'type' => 'datetime'
            )
        );

        // Dynamically getting the required number of line names based on what is connected to the arduino
        while($row = mysqli_fetch_array($headings))
        {
            array_push($table['cols'],
                array(
                    'label' => $row['BEER_NAME'],
                    'type' => 'number'

                ));

            // Creating and populating an array to store the retrieved data to use later
            $headingsArray[]=$row;
        }

        // Populating the rows with the pouring data
        while($datarow = mysqli_fetch_array($data))
        {
            $sub_array = array();
            $datetime = explode(".", $datarow["datetime"]);
            $sub_array[] =  array(
                "v" => 'Date(' . $datetime[0] . '000)'
            );

            // Dynamically adding the pout data from the database
            foreach( $headingsArray as $headrow ) {

                if ($headrow["PORT_NUMBER"] == $datarow["PORT_NUMBER"]) {

                    $sub_array[] =  array(
                        "v" => $datarow["VOLUME"]
                    );
                } else {

                    $sub_array[] =  array(
                        "v" => null
                    );
                }

            }
            // Adding the temporary row to the final row array
            $rows[] =  array(
                "c" => $sub_array
            );
        }

        // Populating the final table with the completed generated rows
        $table['rows'] = $rows;

        // Casting the table to a json table to be used by the google api
        $jsonTable = json_encode($table);


        return $jsonTable;
    }

}