<?php include "includes/header.php"; 
      include "includes/config.php";
    $sname=$_GET["sid"];

    if($_POST["submit"])
    {
     db_connect();

     $uid=1;
     $survey_id=1;
     $points=10;    
     $result = mysql_query("INSERT into user_survey (uid, survey_id, points) values($uid,$survey_id,$points)");

    if ($result) 
        {

          echo '<script>window.location.href = "userp.php";</script>';

        }
        else
        {

         echo  "not sucess";

        }

    }
    else
    {
    	
    }
?>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Welcome To <?php echo $sname;  ?> Survey</h3>
					</div>
					
			</div>
		</div>


		<!-- /.row -->
		<div class="row">
			<div class="col-md-6 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Kindly Fill the Questions below
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form role="form" method="POST">
									<div class="form-group">
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">How often do you buy airtime a day</p>
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;">
											<input type="radio" /> Once<br />
											<input type="radio" /> Twice<br />
											<input type="radio" /> three Times<br />
											<input type="radio" /> not at all<br />
											
											</p>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">How much do you spend per day</p>
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;"><input type="radio" /> Not at All Likely (0)<br />
											<input type="radio" /> (200UGX)<br />
											<input type="radio" /> (500UGX)<br />
											<input type="radio" /> (700UGX)<br />
											<input type="radio" /> (100UGX)<br />
											<input type="radio" /> (200UGX)<br />
											<input type="radio" /> (> 400UGX)<br />
											</p>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">Finally, please tell us a little about yourself&#8230;</p>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 10px;">What is your gender?</p>
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;"><input type="radio" /> Male<br />
											<input type="radio" /> Female</p>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">How old are you?</p>
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;"><input type="radio" /> Under 13<br />
											<input type="radio" /> 13-17<br />
											<input type="radio" /> 18-25<br />
											<input type="radio" /> 26-34<br />
											<input type="radio" /> 35-54<br />
											<input type="radio" /> 55-64<br />
											<input type="radio" /> 65 or over</p>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">What is your current marital status?</p>
									
									</div>

								</div>
								<br>
								<input type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Submit"  />
                            </p>
							</form>
						</div>
						<!-- /.col-lg-3 (nested) -->
					</div>
					<!-- /.row (nested) -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>


	<?php include "includes/footer.php" ?>