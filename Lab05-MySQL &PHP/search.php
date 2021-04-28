<?php
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $mydb = 'mydatabase';
    $table_name = 'Products';
    $connect = mysqli_connect($server, $user, $pass); 

    $product_decs = $_POST["product_desc"];

    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else { 
        $SQLcmd = "SELECT * FROM $table_name WHERE Product_desc = '$product_decs'";
        mysqli_select_db($connect, $mydb);

        $result = mysqli_query($connect, $SQLcmd);
        
        if ($result->num_rows > 0) {
            echo "PRODUCT DATA <br>";
            echo "QUERY : $SQLcmd";
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
