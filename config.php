<?php

    // 1- Create DB Connection
    $con = mysqli_connect('localhost' , 'root' , '' , 'nhc');
    // 2- Check Connection
    if(!$con){
        die('Connection Failed');
    }

?>