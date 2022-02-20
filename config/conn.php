<?php

define('host' , 'localhost');
define('name' , 'root12345');
define('pass' , 'root12345');
define('dbase' , 'hoteldb');

$conn = mysqli_connect(host , name , pass , dbase) or die('unable to connect');


?>