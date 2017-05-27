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

       // $r=mysql_fetch_row($result);
         
          return 1;


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


  
 
?>