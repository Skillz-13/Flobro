<!DOCTYPE html>
<?php
include "GateKeeper.php";
include "search.php";
include "config.php";
// initialize objects
if (!empty($_SESSION['role_id'])) {
    if (((int)$_SESSION['role_id'] == 3 || (int)$_SESSION['role_id'] == 4 || (int)$_SESSION['role_id'] == 1) && (int)$_SESSION['valid'] == 1) {
        //header("Location: {$home_url}dashboardAdminSupport.php");
        //echo '<pre>' . print_r($_SESSION['role_id'], TRUE) . '</pre>';
    } else {
        header("Location: {$home_url}login.php?action=access_denied");
    }

} else {
    header("Location: {$home_url}login.php?action=login_denied");
}

if (isset($_POST['submit'])) {


    $tempSTART_DATE = $_POST['dateStart'];

    $START_DATE = "'$tempSTART_DATE'";

    $tempEND_DATE = $_POST['dateEnd'];

    $END_DATE = "'$tempEND_DATE'";

    $IMEI = $_SESSION["IMEI"];
    //$IMEI = (int)867858033068951;

    require_once('Objects/LineGraph.php');

    $test = new LineGraph();

}
?>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Support Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/report.css" type="text/css">

    <?php
    include_once "config.php";
    $page_title = "Dashboard";
    $require_login = true;
    //include_once "login_checker.php";
    ?>
</head>
<body style="background-image: url(images/woodtexture.jpg);">
<div class="container">

    <!--HEADER PANEL-->
    <div class="panelHeader">
        <div id="lblWelcomeMessage">
            <p>Support Admin Dashboard</p>
            <p>You are logged in as -Name- -Surname-</p>

        </div>
    </div>
    <!--MAIN PANEL-->

    <div class="panelMain">

        <h3 align="center">Graph for (insert company name here)</h3>
        <!-- Calling the graph to display in the specified div/position -->
        <div id="line_chart" style="width: 100%; height: 100%;"></div>

    </div>
    <div class="panelTable">
        <table id="tblReport" class="tblReport">

            <th>Day</th><th>Amount</th>

            <tr>
                <td>yesterday lol</td>
                <td>200</td>
            </tr>
            <tr>
                <td>yesterday lol</td>
                <td>200</td>
            </tr>
            <tr>
                <td>yesterday lol</td>
                <td>200</td>
            </tr>
            <tr>
                <td>yesterday lol</td>
                <td>200</td>
            </tr>
            <tr>
                <td>yesterday lol</td>
                <td>200</td>
            </tr>
            <tr>
                <td>yesterday lol</td>
                <td>200</td>
            </tr>

        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Function to render the graph
    function drawChart() {
        // Passing the json table to the google api
        // the method "print_r" is used for formatting purposes, if it isn't used, an empty graph is generated
        var data = new google.visualization.DataTable(<?php print_r($test->generateGraph($IMEI, $START_DATE, $END_DATE))?>);

        // setting the options
        var options = {
            title: 'Volume (ml)',
            legend: {position: 'bottom'},
            curveType: 'function',
            chartArea: {width: '85%', height: '60%'}

        };

        // Defining the graph type
        var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

        // Method to render the graph
        chart.draw(data, options);
    }
</script>


</body>
</html>
