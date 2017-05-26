<?php
 
/*
 * This is the php script for all connections to the database
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


   db_connect();

    $result = mysql_query("SELECT * FROM users  WHERE username=\"$username\" AND pwd= \"$password\";");



    if (mysql_num_rows($result) > 0) 
        {


          return 1;


        }
        else
        {

          return 0;


        }

  

 }
  
 
?>