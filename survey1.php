<?php include "includes/header.php"; 
      include "includes/config.php";
    
    $sid=$_GET["sid"];
    $uid=$_SESSION['uname'];
    if($_POST["submit"])
    {

    $uid=$_SESSION['uname'];
    $ssid=$_POST["ssid"];
    $pts=get_points($ssid);
    echo $pts;	
    $sub=submit_response($uid,$pts,$ssid);
    if($sub==1)
    {
   //$msg="sucessful";
   echo '<script>window.location.href = "userp.php";</script>';
   
    }
    else
    {
     $msg="not sucessful";
      echo $msg;
    }

   

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

									<input type="hidden" value="<?php echo $sid;   ?>" name="ssid"/>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">How often do you buy airtime a day</p>
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;">
											<input type="radio" /> Once<br />
											<input type="radio" /> Twice<br />
											<input type="radio" /> three Times<br />
											<input type="radio" /> not at all<br />
											
											</p>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">Considering your complete experience with our company, how likely would you be to recommend our company to a friend or colleague? (0 is not at all likely, 10 is extremely likely)</p>
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;"><input type="radio" /> Not at All Likely (0)<br />
											<input type="radio" /> (1)<br />
											<input type="radio" /> (2)<br />
											<input type="radio" /> (3)<br />
											<input type="radio" /> (4)<br />
											<input type="radio" /> (5)<br />
											<input type="radio" /> (6)<br />
											<input type="radio" /> (7)<br />
											<input type="radio" /> (8)<br />
											<input type="radio" /> (9)<br />
											<input type="radio" /> Extremely Likely (10)</p>
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
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;"><input type="radio" /> Single, never married<br />
											<input type="radio" /> Married without children<br />
											<input type="radio" /> Married with children<br />
											<input type="radio" /> Divorced<br />
											<input type="radio" /> Separated<br />
											<input type="radio" /> Widowed<br />
											<input type="radio" /> Living with partner</p>
										<p class="question-title" style="font-size: 12px; color: #424242; font-weight: bold; margin-top: 50px;">What is the highest level of education you have completed?</p>
										<p class="question-choices" style="font-size: 12px; color: #424242; font-weight: bold;"><input type="radio" /> Less than High School<br />
											<input type="radio" /> High School / GED<br />
											<input type="radio" /> Some College<br />
											<input type="radio" /> 2-year College Degree<br />
											<input type="radio" /> 4-year College Degree Masters Degree<br />
											<input type="radio" /> Doctoral Degree<br />
											<input type="radio" /> Professional Degree (JD, MD)</p>
									</div>

								</div>
								<br>
								<input type="submit" value="Submit" name="submit" class="btn btn-primary btn-lg btn-block" Submit /input>
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