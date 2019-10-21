<?php

$connect = mysqli_connect("localhost", "root", "", "test");
$query = '
SELECT PORT_NUMBER , UNIX_TIMESTAMP(CONCAT_WS(" ", DATE(LOG_DATE), TIME(LOG_DATE))) AS datetime  , VOLUME FROM tbl_log order by PORT_NUMBER
';
$result = mysqli_query($connect, $query);
$rows = array();
$table = array();
$currentPort = 0;

$table['cols'] = array(

    array(
        'label' => 'Time',
        'type' => 'datetime'
    ),
    array(
        'label' => 'TAP_1',
        'type' => 'number'
    ),
    array(
        'label' => 'TAP_2',
        'type' => 'number'
    ),
    array(
        'label' => 'TAP_3',
        'type' => 'number'
    ),
    array(
        'label' => 'TAP_4',
        'type' => 'number'
    )

);

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

?>


<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart()
        {
            var data = new google.visualization.DataTable(<?php echo $jsonTable; ?>);

            var options = {
                title:'Volume (ml)',
                legend:{position:'bottom'},
                chartArea:{width:'85%', height:'75%'}
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

            chart.draw(data, options);
        }
    </script>
    <style>
        .page-wrapper
        {
            width:1000px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<div class="page-wrapper">
    <br />
    <h3 align="center">Graph for (insert company name here)</h3>
    <div id="line_chart" style="width: 100%; height: 500px"></div>
</div>
</body>
</html>
