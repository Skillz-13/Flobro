<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>(Based on graph layout, fix later) Bar Manager Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/dashboardSalesRep.css" type="text/css">
</head>
<body style="background-image: url(images/woodtexture.jpg);">
<div class="container">
    <!--NAVIGATION BAR PANEL-->
    <div class="panelNavBar">
        <img id="imgLogo" src="images/logoBoston.png">
        <div id="lblCurrentPage"><p><b>Home</b></p></div>
        <a name="btnManageClients"id="btnManageClients" class="btn" href="formManageClients.php"><p>Manage Clients</p></a>
        <a name="btnClientReport" id="btnClientReport" class="btn" href="formClientReport.php"><p>Client Reports</p></a>
        <a name="btnSalesReports" id="btnSalesReports" class="btn" href="formSalesReport.php"><p>Sales Reports</p></a>
        <a name="btnNotes" id="btnNotes" class="btn" href="formNotes.php"><p>Notes</p></a>
        <a name="btnLogout" id="btnLogout" class="btn" href="logout.php"><p>Log Out</p></a>
    </div>
    <!--HEADER PANEL-->
    <div class="panelHeader">
        <div id="lblWelcomeMessage">
            <p>(Based on graph layout, fix later) Bar Manager Dashboard</p>
            <?php
            session_start();
            echo ($_SESSION['role_id']);
            echo ($_SESSION['valid']);

            require_once('Objects/LineGraph.php');

            $test = new LineGraph();

            // Replace these

            $IMEI = (int)867858033068951;
            $START_DATE_TEMP = ( date("Y-m-d",strtotime("2019-09-10")));

            $START_DATE = "'$START_DATE_TEMP'";

            $END_DATE_TEMP = date("Y-m-d",strtotime("2019-09-11"));

            $END_DATE = "'$END_DATE_TEMP'";

            //WITH
            //$IMEI = (int)$_SESSION['imei'];
            //$START_DATE_TEMP = date("Y-m-d",strtotime("-7 days"));
            //$START_DATE = "'$START_DATE_TEMP'";
            //$END_DATE_TEMP = date("Y-m-d",strtotime("tomorrow"));
            //$END_DATE = "'$END_DATE_TEMP'";

            ?>
            <p>You are logged in as -Name- -Surname-</p>
        </div>
    </div>
    <!--MAIN PANEL-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            // Function to render the graph
            function drawChart()
            {
                // Passing the json table to the google api
                // the method "print_r" is used for formatting purposes, if it isn't used, an empty graph is generated
                var data = new google.visualization.DataTable(<?php print_r($test ->generateGraph($IMEI,$START_DATE,$END_DATE))?>);

                // setting the options
                var options = {
                    title:'Volume (ml)',
                    legend:{position:'bottom'},
                    curveType: 'function',
                    chartArea:{width:'85%', height:'75%'}

                };

                // Defining the graph type
                var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

                // Method to render the graph
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

    <div class="panelMain">
        <!-- Adding the graph heading -->
        <h3 align="center">Graph for (insert company name here)</h3>
        <!-- Calling the graph to display in the specified div/position -->
        <div id="line_chart" style="width: 100%; height: 90%;"></div>
    </div>



</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>