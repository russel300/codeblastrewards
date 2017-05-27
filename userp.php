<?php include "includes/header.php"; 
      include "includes/config.php";

      $uname=$_session["uname"];

      if($uname="")
      {

  echo '<script>window.location.href = "userlogin.php";</script>';
      }

 $ps=view_points(1);
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Welcome User</h3>
                    </div>
                    <div class="panel-body">
                    <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>

                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $ps;  ?></div>
                                    <div>POINTS</div>
                                </div>


                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Points</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
<<<<<<< HEAD
                
                
=======
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-certificate fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">2</div>
                                    <div>New SURVEYS!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Profile</span>
                                <span class="pull-right"><i class="fa fa-user"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-wrench fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Edit Profile</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="userlogin.php?lg=1">
                            <div class="panel-footer">
                                <span class="pull-left">Logout</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
>>>>>>> origin/master
                    </div>
                </div>
            </div>
            <!-- /.row -->
                        <!-- /.panel-heading -->
                <!-- /.panel-heading -->
                        <div class="panel-body">

                           <?php
                          
                          db_connect();

                          $res=mysql_query("select * from survey");

                          while($r=mysql_fetch_array($res))
                          {

                            $sname=$r["survey_name"];

                            echo'

                           <div class="alert alert-success"><h3>'.$r["survey_name"].' </h3> &nbsp;&nbsp;<b>'.$r["points"].'</b><a href="'.$r["survey_url"].'?sid='.$sname.'" class="alert-link">Click Here</a>.
                            </div>

                            ';
                          }



                           ?>
                            


                            
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>