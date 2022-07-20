<?php include 'connect.php' ; ?>



<?php

    $year = $_POST['year'];
    $headline = $_POST['headline'];
    $text = $_POST['text'];
    $media= $_POST['media'];




    mysqli_query($conn, "INSERT INTO tbl_info (year, headline, text, media)
                        VALUE ('$year' , '$headline', '$text', '$media')");

    

    if (mysqli_affected_rows($conn) > 0 ) {

        echo "<script type='text/javascript'>";
		
	    echo"window.location = 'f.php';";
		echo "</script>";

    } else {

        echo 'You not Insert Data';
        echo mysqli_error($conn) ;
    }

    


?>