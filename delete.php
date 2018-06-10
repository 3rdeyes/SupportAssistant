<?php

/*
 * App developed & maintained by Rayhan
 * For more information please call on 01776305469 or email me on smartdevworld@gmail.com
 */

include 'db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM supportdesk WHERE id = '$id'";
    $val = $db->query($sql);
    if ($val==true){
		header('location: index.php');

    }
?>
