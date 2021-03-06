<?php include "includes/header.php" ?>
<?php include "includes/topnav.php" ?>
<?php include "includes/sidebar.php" ;
      include "includes/config.php";
      db_connect();
?>

<body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         Survey statistics
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?php

/* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/

include("includes/fusioncharts.php");

/* The following 4 code lines contains the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */

$hostdb = "localhost";  // MySQl host
$userdb = "root";  // MySQL username
$passdb = "";  // MySQL password
$namedb = "rewards_db";  // MySQL database name

// Establish a connection to the database
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

/*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>

    <html>

    <head>
        <title>Rewards </title>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.zune.js"></script>
    </head>

    <body>

        <?php

  $strQuery = "SELECT DISTINCT `survey`.`survey_name` , `user_survey`.`points` FROM `user_survey`,`user`,`survey`,`business_partner` where `survey`.`survey_id`=`user_survey`.`survey_id`  ";
  $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
  if ($result) {

  $arrData = array(
        "chart" => array(
            "caption"=> "Survey rewards",
            "subCaption"=> "Points per survey",
            "xAxisname"=> "Survey",
            "yAxisName"=> " points",
            "numberSuffix"=> "$",
            "legendItemFontColor"=> "#666666",
            "theme"=> "zune"
            )
          );
          // creating array for categories object

          $categoryArray=array();
          $dataseries1=array();
          //$dataseries2=array();
          //$dataseries3=array();

          // pushing category array values
          while($row = mysqli_fetch_array($result)) {
            array_push($categoryArray, array(
            "label" => $row[0]
          )
        );
        array_push($dataseries1, array(
          "value" => $row[1]
          )
        );
        /*
        array_push($dataseries2, array(
          "value" => $row["value2"]
          )
        );
        array_push($dataseries3, array(
          "value" => $row["value3"]
          )
        );*/

      }

      $arrData["categories"]=array(array("category"=>$categoryArray));
      // creating dataset object
      $arrData["dataset"] = array(array("seriesName"=> "Points attained for each survey", "renderAs"=>"line", "data"=>$dataseries1));/*, array("seriesName"=> "Projected Revenue",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Profit",  "renderAs"=>"area", "data"=>$dataseries3));*/


      /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */
      $jsonEncodedData = json_encode($arrData);

      // chart object
      $msChart = new FusionCharts("mscombi3d", "chart1" , "600", "350", "chart-container", "json", $jsonEncodedData);

      // Render the chart
      $msChart->render();

      // closing db connection
      $dbhandle->close();

   }

?>

<center>
                <div id="chart-container"></div>
            </center>

                            <!-- /.table-responsive -->
                       
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
     
<?php include "includes/footer.php" ?>