<?php include 'connect.php'; 
 
 
//สร้างตัวแปร
$i_id = $_GET['i_id'];
 
 
//ลบข้อมูล
$sql = " DELETE FROM tbl_info WHERE i_id='$i_id' ";



$result = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());

//ปิดการเชื่อมต่อ database
mysqli_close($conn);
    

	
 
				
				
				//ถ้าสำเร็จให้ขึ้นอะไร
	if ($result){
		echo "<script type='text/javascript'>";
		
	    echo"window.location = 'f.php';";
		echo "</script>";
		}
		else {
			//กำหนดเงื่อนไขว่าถ้าไม่สำเร็จให้ขึ้นข้อความและกลับไปหน้าเพิ่ม		
				echo "<script type='text/javascript'>";
				echo "alert('error!');";
				echo"window.location = 'f.php'; ";
				echo"</script>";
	}
 
 
 
 
?>