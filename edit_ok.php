<?php include 'dbcon.php' ; ?>



<?php 
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
?>




<?php



$i_id = $_POST["i_id"];
$year = $_POST["year"];
$headline = $_POST["headline"];
$text = $_POST["text"];
$media = $_POST["media"];



//แก้ไขข้อมูล

//UPDATE tbl_info SET `year` = "" , `headline` = "", `text` = "", `media` = "" WHERE i_id = 720
function consoleLog($msg) {
	echo '<script type="text/javascript">' .
	  'console.log(' . $msg . ');</script>';
}
//$query = "UPDATE customers SET CUST_ID='$id',CUST_FORENAME='$name', CUST_PHONE='$phone', CUST_SURNAME='$surname' WHERE CUST_ID='$id'";
	$sql = "UPDATE tbl_info SET `year` = '$year', `headline` = '$headline' , `text` = '$text' ,`media` = '$media' WHERE i_id = '$i_id'";
		
		
		//consoleLog("Updated!!!");		
		


	
	$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

		//console.log("Result OK!!!!");	

//ปิดการเชื่อมต่อ database
mysqli_close($conn);




//สร้างตัวแปร





//ถ้าสำเร็จให้ขึ้นอะไร
if ($result){
echo "<script type='text/javascript'>";
echo"alert('Edit Success');";
echo"window.location = 'f.php';";
echo "</script>";
}
else {
//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
echo "<script type='text/javascript'>";
echo "alert('error!');";
echo"window.location = 'edit.php'; ";
echo"</script>";
}
?>