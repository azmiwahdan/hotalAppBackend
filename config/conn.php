<?php

define('host' , 'localhost');
define('name' , 'root');
define('pass' , '');
define('dbase' , 'hoteldb');

$conn = mysqli_connect(host , name , pass , dbase) or die('unable to connect');


?>