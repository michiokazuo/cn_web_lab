<html><head><title>Create Table</title></head><body>
<?php
   
   include "../Config/config5_3.php";
   $server = SERVER;
   $user = USERNAME;
   $pass = PASSWORD;
   $mydb = DB_NAME;
   $table_name = TABLE_NAME;
   $connect = mysqli_connect($server, $user, $pass); 

    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else { 
            $SQLcmd = "CREATE TABLE $table_name(
                        ProductID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        Product_desc VARCHAR(50),
                        Cost INT, 
                        Weight INT, 
                        Numb INT)";
    mysqli_select_db($connect, $mydb);

    if (mysqli_query($connect, $SQLcmd)){
        print '<font size="4" color="blue" >Created Table';
        print "<i>$table_name</i> in database<i>$mydb</i><br></font>"; 
        print "<br>SQLcmd=$SQLcmd";
    } else {
        die ("Table Create Creation Failed SQLcmd=$SQLcmd");
    } 
    mysqli_close($connect);
    }
?>
</body>
</html> 

