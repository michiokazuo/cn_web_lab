<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'mydatabase';
    $table_name = 'Products';
    $connect = mysqli_connect($server, $user, $pass); 

    $item_decs = $_POST["itemDescription"];
    $weight = $_POST["weight"];
    $cost = $_POST["cost"];
    $numAvailable = $_POST["numAvailable"];

    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else { 
            $SQLcmd = "INSERT INTO $table_name VALUES('0', '$item_decs', '$weight', '$cost', '$numAvailable')";
    mysqli_select_db($connect, $mydb);

    if (mysqli_query($connect, $SQLcmd)){
        print '<font size="4" color="blue" >The QUERY is';
        print "<br>SQLcmd=$SQLcmd";
        print "Successful";
    } else {
        die ("Insert Failed SQLcmd=$SQLcmd");
    } 
    mysqli_close($connect);
    }
?>

