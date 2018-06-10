<?php

/* 
 * App developed & maintained by Rayhan
 * For more information please call on 01776305469 or email me on smartdevworld@gmail.com
 */
$db = new mysqli;
$db->connect('localhost', 'root',';bms','usa');
if (!$db){
    echo 'database not connected';
}
?>