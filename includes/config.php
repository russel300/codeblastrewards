<?php
 
/*
 * This is the php script for all connections to the database and all functions that need to talk to the db
 * 
 */
 
function  db_connect()
  {

 $con = mysql_connect("localhost", "root", "");  

    if (!$con)
      {
          die('Could not connect: ' . mysql_error());
      }
      mysql_select_db("rewards_db", $con);

 }





function  user_login($username, $password)
  {

    $password=md5($password);

    // user login script

   db_connect();

    $result = mysql_query("SELECT * FROM user  WHERE email=\"$username\" AND pwd= \"$password\";");



    if (mysql_num_rows($result) > 0) 
        {   
          while ($row=mysql_fetch_array($result)) {
            return $row['uid'];
          }
          

        }
        else
        {
          return 0;
        }

  

   }



function  user_add($full_names, $username, $email, $phone_number, $p_id, $pwd)
  {

   // a method to add users to the database reward_db
   db_connect();

    $result = mysql_query("INSERT into user (full_names,username,email,phone_number,p_id,pwd) values('$full_names','$username', '$email', '$phone_number', $p_id, '$pwd');");



    if ($result) 
        {


          return 1;

        }
        else
        {

          return 0;

        }

 }




function  submit_response($uid, $points, $survey_id)
  {

   // a method to add users to the database reward_db
   db_connect();

    $result = mysql_query("INSERT into user_survey (uid, survey_id, points) values($uid,$survey_id, $points)");



    if ($result) 
        {


          return 1;

        }
        else
        {

          return 0;

        }
 }



function  view_usersurveys($uid)
  {

    // user survey display script

   db_connect();

    $result = mysql_query("SELECT * FROM user_survey  WHERE uid=$uid ;");

    $snumber=mysql_num_rows($result);
    if($snumber >0)
    {


    }
    else
    {



    }


 }





function  view_points($uid)
  {

    // user survey display script

   db_connect();

    $result = mysql_query("SELECT * FROM user_survey  WHERE uid=$uid ;");

    $ps=0;
    while($r=mysql_fetch_array($result))
    {
  $ps=$ps+$r["points"];

    }

    return $ps;

 } 





function logout()
 {

  //function to manage logout of users
  session_destroy();
 

 }




function getsession()
 {

 if(isset($_SESSION['uname'])){
    
}else{
    echo '<script>window.location.href = "userlogin.php";</script>';
}

 

 } 




function num_surveys()
 {
       
       db_connect();
        $res=mysql_query("select * from survey");
        $num=0;
        $snew=0;
        $taken=0;

        while($r=mysql_fetch_array($res))
        {

        $surveyid=$r['survey_id'];
        $user=$_SESSION['uname'];

         $snew++;

         $num=0;
        $attmpt=mysql_query("SELECT  * FROM `user_survey` WHERE survey_id=$surveyid and uid=$user");

           while($row_attmpt=mysql_fetch_array($attmpt))
        {

        $num++;
        }
        
        if($num >=1)
        {
       $taken++;

        }
        else
        {
      
        }

        }

        return $snew-$taken;
 }




function available_surveys()
 {
       db_connect();

        $res=mysql_query("select * from survey");

        while($r=mysql_fetch_array($res))
        {

        $surveyid=$r['survey_id'];
        $user=$_SESSION['uname'];

        $attmpt=mysql_query("SELECT  * FROM `user_survey` WHERE survey_id=$surveyid and uid=$user");

        $num=0;
        while($row_attmpt=mysql_fetch_array($attmpt))
        {

        $num++;
        }


        $sname=$r["survey_name"];

        if($num >=1)
        {

        echo'
        <div class="alert alert-success"><h5> '.$r["survey_name"].' - '.$r["points"].'&nbsp;Points</h5> &nbsp;&nbsp;<b>Completed</b> .
        </div>

        ';

        }
        else
        {

        echo'
        <div class="alert alert-success"><h5> '.$r["survey_name"].'- '.$r["points"].'&nbsp;Points</h5> &nbsp;&nbsp;<b></b><a href="'.$r["survey_url"].'?sid='.$sname.'" class="alert-link" >Click Here</a>.
        </div>

        ';

        }

        }





 } 
 
?>