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
                    <h1 class="page-header">Submissions</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Submissions
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Survey Name</th>
                                        <th>Date Submitted</th>
                                        <th>Points</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                                
                                $res=mysql_query("select * from user_survey s inner join user u on(s.uid=u.uid) inner join survey su on(s.survey_id=su.survey_id)");

                                while($r=mysql_fetch_array($res))
                                {

                                $uname=$r["full_names"];
                                $sname=$r["survey_name"];
                                $sdate=$r["datentime"];
                                $points=$r["points"];

                                echo '
                                
                                 <tr class="odd gradeX">
                                        <td>'.$uname.'</td>
                                        <td>'.$sname.'</td>
                                        <td>'.$sdate.'</td>
                                        <td class="center">'.$points.'</td>
                                       
                                    </tr>

                                ';
                                }

                                ?>






                                   
                                   
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">Download Excel CSV</a>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
     
<?php include "includes/footer.php" ?>