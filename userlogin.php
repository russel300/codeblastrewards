<?php include "includes/header.php";
      include "includes/config.php" ;
$errors="";

if(isset($_GET["lg"]))
{
if($_GET["lg"]==1)
{
logout();

}

}
if($_POST)
{

$email=$_POST["email"];
$password=$_POST["password"];

$login=user_login($email,$password);

if($login>=1)
{

$_SESSION['uname']=$login;

if($login==1)
{
echo '<script>window.location.href = "allsub.php";</script>';

}
else
{
echo '<script>window.location.href = "userp.php";</script>';

}


}
else
{

$errors="Login Failled, kindly check credentials";
}

}




?>
<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">

                         <h3 class="panel-title"><?php  echo $errors; ?></h3>
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit"  class="btn btn-lg btn-success btn-block" name="send" value="Submit">
                               <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>-->
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "includes/footer.php" ?>
<!--/Form with header-->