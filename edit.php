<?php include 'dbcon.php' ; ?>



  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Untitled Document</title>
  </head>


  <style>

label {
    display: inline-block;
    width: 100px;
    margin-bottom: 10px;
}




</style>

  
  <body>
  <?php 
  //echo "<pre>";
  //print_r($_GET);
  //echo "</pre>";
 ?>
  
  
  
  

  
  
  
  <?php
  $i_id = $_GET['i_id'];


  
  $query = "SELECT * FROM tbl_info where i_id = '$i_id' " or die("Error:" . mysqli_error());  //คำสั่งให้เลือกข้อมูลจาก TABLE ชื่อ tbl_member โดยเรียงจาก member_id และให้เรียงลำดับจากมากไปน้อยคือ DESC
  //ประกาศตัวแปร sqli
  $result = mysqli_query($conn, $query);
  $data = mysqli_fetch_array($result);
  mysqli_close($conn);
  
  ?>
  
  
  
  
  <tr>
  

  <h1>Edit Data</h1>

  <form action="edit_ok.php" method="post">

        <input name="i_id" type="hidden" i_id="i_id" value="<?=$data['i_id']?>">

        <label>Year</label>
        <input type="text" name="year" value="<?=$data['year']?>"><br>
    
        <label>Headline</label>
        <input type="text" name="headline" value="<?=$data['headline']?>"><br>
    
        <label>Text</label>
        <input type="text" name="text" value="<?=$data['text']?>"><br>
    
        <label>Media</label>
        <input type="text" name="media" value="<?=$data['media']?>"><br>
    
        <input type="submit" value="Submit"> 

          <a href="insert.html">Insert</a>

</form>



  </tr>
 
  </table>
    <br />
    
  </form>
  <p>&nbsp;</p>

  </body>
  </html>