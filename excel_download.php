<?php 
ini_set('max_execution_time', 300);
ini_set('memory_limit','200M');
ini_set("display_errors", "on");
$dbhost= "localhost"; //your MySQL Server 
$dbuser = "mobile"; //your MySQL User Name 
$dbpass = ""; //your MySQL Password 
$dbname = "rewards_db"; 
//your MySQL Database Name of which database to use this 
//$tablename = "questions"; //your MySQL Table Name which one you have to create excel file 
// your mysql query here , we can edit this for your requirement 
 
//create  code for connecting to mysql 
$Connect = @mysql_connect($dbhost, $dbuser, $dbpass) 
or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno()); 
//select database 
$Db = @mysql_select_db($dbname, $Connect) 
or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno()); 
//execute query 
 /* $id = $_POST['id'];
  $name = $_POST['name'];
  $street = $_POST['street'];
  $lat = $_POST['lat'];
  $long = $_POST['long'];
  $city = $_POST['city'];*/
//error_reporting(E_ALL);

 require_once 'includes/PHPExcel.php';
 $objPHPExcel = new PHPExcel();
$objPHPExcel->createSheet(10);
 // Set the active Excel worksheet to sheet 0 
$borderArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('argb' => '000000'),
        ),
    ),
);


/*$objPHPExcel->getActiveSheet()->setCellValue('C4','Shop')
                            ->setCellValue('V4','Brand Materials(What does the shop use to brand and how many do they have)')
                            ->setCellValue('AC4','Product Availability(How many simcards and how much airime do u have)')
                            ->setCellValue('AN4','Buying Price(At how much do you buy airtime and simcards from the distributor)')
                            ->setCellValue('AP4','Selling Price(At how much do you sell airtime and simcards to the Customers)');*/



$objPHPExcel->setActiveSheetIndex(0)->setTitle('Survey Logs')->mergeCells('C3:G3');
//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('V4:AB4');
//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AC4:AM4');
//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AN4:AO4');
//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('AP4:AZ4');
$objPHPExcel->getActiveSheet()->getStyle("C4:BH4")->getFont()->setBold(true)->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle("C4:BH4")->getAlignment()->applyFromArray(
    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
);
$objPHPExcel->getActiveSheet()
    ->getStyle("C4:G4")
    ->applyFromArray($borderArray);


$objPHPExcel->getActiveSheet()->getStyle("C1:C65536")->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle("U1:U65536")->getFont()->setBold(true);


$objPHPExcel->getActiveSheet()->setCellValue('C3','Survey Logs');

//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C3:AZ3');
$objPHPExcel->getActiveSheet()->getStyle("C3:BH3")->getFont()->setBold(true)->setSize(16);
$objPHPExcel->getActiveSheet()->getStyle("C3:BH3")->getAlignment()->applyFromArray(
    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
);
$objPHPExcel->getActiveSheet()
    ->getStyle("C3:G3")
    ->applyFromArray($borderArray);








// Initialise the Excel row number 
$sql = "SELECT `user_survey`.`datentime`, `user`.`full_names` as 'Survey user', `survey`.`survey_name`,`business_partner`.`partner_name`,`user_survey`.`points` FROM `user`,`survey`,`user_survey`,`business_partner` WHERE `user_survey`.`uid`=`user`.`uid` and `user_survey`.`survey_id`=`survey`.`survey_id` and `survey`.`p_id`=`business_partner`.`p_id`";

$result = @mysql_query($sql,$Connect) 
or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno()); 
$rowCount = 4;  


//start of printing column names as names of MySQL fields  

 $column = 'C';
 $heading=array("Date Submitted"  ,
"User", 
"Survey",
"Originator",   
"Points"  
  
 
);
 $arrlength=count($heading);

for($x=0;$x<$arrlength;$x++)
  {
   $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $heading[$x]);
    $objPHPExcel->getActiveSheet()->getStyle($column.$rowCount.':'.$column.$rowCount)->getFont()->setBold(true)->setSize(13);
    $objPHPExcel->getActiveSheet()
                ->getStyle($column.$rowCount.':'.$column.$rowCount)
                ->applyFromArray($borderArray);
    $column++;
  }


$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(19);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(17.29);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(27);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(31.4);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(17);
//$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
/*for ($i = 0; $i < mysql_num_fields($result); $i++)  

{
    $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, mysql_field_name($result,$i));
    $objPHPExcel->getActiveSheet()->getStyle($column.$rowCount.':'.$column.$rowCount)->getFont()->setBold(true)->setSize(13);
    $column++;
}*/

//end of adding column names  
//start while loop to get data  

$rowCount = 5;  

while($row = mysql_fetch_row($result))  

{  
    $column = 'C';

   for($j=0; $j<mysql_num_fields($result);$j++)  
    {  
        if(!isset($row[$j]))  

            $value = NULL;  

        elseif ($row[$j] != "")  

            $value = strip_tags($row[$j]);  

        else  

            $value = "";  


        $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
        $objPHPExcel->getActiveSheet()
                ->getStyle($column.$rowCount.':'.$column.$rowCount)
                ->applyFromArray($borderArray);
        
            # code...
       
        $objPHPExcel->getActiveSheet()
    ->getStyle($column.$rowCount)
    ->getFont()->setBold(true);
     
        
        $column++;
    }  

    $rowCount++;
} 









// Redirect output to a client’s web browser (Excel5) 
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="shortcodes.xls"'); 
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save('php://output');