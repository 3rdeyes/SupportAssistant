<?php

/* 
 * App developed & maintained by Rayhan
 * For more information please call on 01776305469 or email me on smartdevworld@gmail.com
 */

include 'db.php';
if (isset($_POST['send'])) {
    $name = $_POST['username'];
    $problem = $_POST['problemdetails'];
    $sql = "INSERT INTO supportdesk (username, problemdetails)VALUES ('$name', '$problem')";
    $val = $db->query($sql);
    if ($val==true){
        echo 'data inserted';
		header('location: index.php');
        
    }
    
}
?>