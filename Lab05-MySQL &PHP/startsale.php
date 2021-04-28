<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form action='sale.php' method='POST'>
        Select Product We Just Sold:
        <input type='radio' name='product'> 
        <br><br>
        <input type='submit'>
        <input type='reset'>
    </form> -->
    <?php
        $server = 'localhost';
        $user = 'root';
        $pass = '';
        $mydb = 'mydatabase';
        $table_name = 'Products';
        $connect = mysqli_connect($server, $user, $pass); 

        if (!$connect) {
            die ("Cannot connect to $server using $user");
        } else { 
            $SQLcmd = "SELECT * FROM $table_name";
            mysqli_select_db($connect, $mydb);

            $result = mysqli_query($connect, $SQLcmd);
            
            if ($result->num_rows > 0) {
                $choose = "<form action='sale.php' method='POST'> <p></p>Select Product We Just Sold:</p>";

                $table =  "<link rel='stylesheet' href='style.css'>
                <table> 
                    <tr>
                        <th>ProductID</th>
                        <th>Product_desc</th>
                        <th>Cost</th><th>Weight</th>
                        <th>Numb</th>
                    </tr>";
                while ($row = $result->fetch_assoc()) {
                    $table .= "<tr><td>".$row["ProductID"]."</td>".
                        "<td>".$row["Product_desc"]."</td>".
                        "<td>".$row["Cost"]."</td>".
                        "<td>".$row["Weight"]."</td>".
                        "<td>".$row["Numb"]."</td></tr>";
                    $choose .= "<input type='radio' name='product' value='".$row["Product_desc"]."'><label for='product'>".$row["Product_desc"]."</label>";
                }

                $choose .= " <br><br> <input type='submit'> <input type='reset'> </form><br><br>";
                
                $table .= "</table>";

                echo $choose;
                echo "QUERY : $SQLcmd";
                echo $table;
            }

            mysqli_close($connect);
            }
    ?>

</body>
</html>
