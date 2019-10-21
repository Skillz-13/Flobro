<?php
class Graph{

    function generateGraph($IMEI, $START_DATE, $END_DATE){


        $connect = mysqli_connect("localhost", "root", "", "test");
        $dataQuery = '
                SELECT PORT_NUMBER , 
                UNIX_TIMESTAMP(CONCAT_WS(" ", DATE(LOG_DATE), TIME(LOG_DATE))) AS datetime ,
                VOLUME FROM tbl_log
                WHERE ARD_IMEI_NUMBER = '.$IMEI.' 
                BETWEEN '.$START_DATE.' AND '.$END_DATE.'
                order by PORT_NUMBER
';
        $headingQuery =
            '
                SELECT distinct PORT_NUMBER FROM `tbl_log` order by PORT_NUMBER
';
        $result = mysqli_query($connect, $dataQuery);
        $headings = mysqli_query($connect, $headingQuery);
        $rows = array();
        $table = array();

        $table['cols'] = array(

            array(
                'label' => 'Time',
                'type' => 'datetime'
            )
        );
            while($row = mysqli_fetch_array($headings))
            {
                $table['cols'].push(
                array(
                    'label' => 'TAP_' .$row['PORT_NUMBER'],
                    'type' => 'number'
                ));
            }





        while($row = mysqli_fetch_array($result))
        {
            $sub_array = array();
            $datetime = explode(".", $row["datetime"]);
            $sub_array[] =  array(
                "v" => 'Date(' . $datetime[0] . '000)'
            );
            if($row["PORT_NUMBER"] == 1){
                $sub_array[] =  array(
                    "v" => $row["VOLUME"]
                );
                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => null
                );
            }
            else if($row["PORT_NUMBER"] == 2){

                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => $row["VOLUME"]
                );
                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => null
                );
            }
            else if($row["PORT_NUMBER"] == 3){

                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => $row["VOLUME"]
                );
                $sub_array[] =  array(
                    "v" => null
                );
            }
            else if($row["PORT_NUMBER"] == 4){

                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => null
                );
                $sub_array[] =  array(
                    "v" => $row["VOLUME"]
                );
            }
            $rows[] =  array(
                "c" => $sub_array
            );

        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table);

        return $jsonTable;
    }

}