<?php
   include "../Config/config5_3.php";
    $server = SERVER;
    $user = USERNAME;
    $pass = PASSWORD;
    $mydb = DB_NAME;
    $table_name = TABLE_NAME;
    $connect = mysqli_connect($server, $user, $pass);  

    $product_desc = $_POST['product'];

    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else { 
        $SQLcmdUpdate = "UPDATE $table_name SET Numb = Numb - 1 WHERE Product_desc = '$product_desc';";
        $SQLcmd = "SELECT * FROM $table_name";
        mysqli_select_db($connect, $mydb);

        mysqli_query($connect, $SQLcmdUpdate);

        $result = mysqli_query($connect, $SQLcmd);
        
        if ($result->num_rows > 0) {
            echo "QUERY : $SQLcmdUpdate";
            $rs =  "<link rel='stylesheet' href='style.css'>
            <table> 
                <tr>
                    <th>ProductID</th>
                    <th>Product_desc</th>
                    <th>Cost</th><th>Weight</th>
                    <th>Numb</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                $rs .= "<tr><td>".$row["ProductID"]."</td>".
                    "<td>".$row["Product_desc"]."</td>".
                    "<td>".$row["Cost"]."</td>".
                    "<td>".$row["Weight"]."</td>".
                    "<td>".$row["Numb"]."</td></tr>";
            }
            
            $rs.= "</table>";
            echo $rs;
        }

        mysqli_close($connect);
        }
?>
