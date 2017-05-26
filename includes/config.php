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
      mysql_select_db("rewards", $con);

 }
  
 
?>