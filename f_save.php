<?php
$conn = mysqli_connect("localhost","root","","ex_c");
require_once('php-excel-reader/excel_reader2.php');
require_once('SpreadsheetReader.php');



if (isset($_POST["import"]))
{
       
  $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for($i=0;$i<$sheetCount;$i++)

       
        
        { 
           
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)

            
            {

                $year = "";//ฟิว 1
                if(isset($Row[0])) {
                    $year = mysqli_real_escape_string($conn,$Row[0]);
                }//ฟิว 1
                
                $headline = "";//ฟิว 2
                if(isset($Row[1])) {
                    $headline = mysqli_real_escape_string($conn,$Row[1]);
                }//ฟิว 2

                $text = "";//ฟิว 3
                if(isset($Row[2])) {
                    $text = mysqli_real_escape_string($conn,$Row[2]);
                }//ฟิว 3

                $media = "";//ฟิว 4
                if(isset($Row[3])) {
                    $media = mysqli_real_escape_string($conn,$Row[3]);
                }//ฟิว 4 

                
                if (!empty($year) || 
                    !empty($headline) || 
                    !empty($text) || 
                    !empty($media)) {

                    $query = "insert into tbl_info
                              (year,headline,text,media) 
                              values('".$year."',
                                     '".$headline."',
                                     '".$text."',
                                     '".$media."')";
                    $result = mysqli_query($conn, $query);
                

                
                    if (! empty($result)) {
                      $type = "success";
                      $message = "Excel Data Imported into the Database";
                      echo "<script>";
                      echo"alert('success Excel Data Imported into the Database');";
                      echo"window.location ='f.php';";
                      echo "</script>";
                        

                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                        echo "<script>";
                        echo"alert('error Problem in Importing Excel Data');";
                        echo"window.location ='f.php';";
                        echo "</script>";
                    }
                }
             }
        
         }
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
        echo "<script>";
        echo"alert('error Invalid File Type. Upload Excel File.');";
        echo"window.location ='f.php';";
        echo "</script>";
  }
}
?>