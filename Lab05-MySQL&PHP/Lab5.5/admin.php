<?php
    include "../Config/config5_567.php";
    $server = SERVER;
    $user = USERNAME;
    $pass = PASSWORD;
    $mydb = DB_NAME;
    $categories = "categories";

    $connect = mysqli_connect($server, $user, $pass); 
    if (!$connect) {
        die ("Cannot connect to $server using $user");
    } else { 
        mysqli_select_db($connect, $mydb);
        
        if (isset($_POST["ID_Cat"]) && isset($_POST["Title"]) && isset($_POST["Description"])) {
            $ID = $_POST["ID_Cat"];
            $Title = $_POST["Title"];
            $Description = $_POST["Description"];
            
            $queryAdd = "INSERT into Categories values ('$ID', '$Title', '$Description')";
            mysqli_query($connect, $queryAdd);
        }

        $query = "SELECT * FROM $categories";
        
        $result = mysqli_query($connect, $query);

        $table =  "<link rel='stylesheet' href='style1.css'>
                   <form action='admin.php' method='POST' id='addForm'>
                    <table> 
                        <tr>
                            <th>Cat ID</th>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $table .= "<tr>
                                <td>".$row["ID_Category"]."</td>
                                <td>".$row["Title"]."</td>
                                <td>".$row["Description"]."</td>
                           </tr>";
            }
        }

        $table .= "<tr>
                        <td><input type='text' name='ID_Cat' form='addForm' required></td>
                        <td><input type='text' name='Title' form='addForm' required></td>
                        <td><input type='text' name='Description' form='addForm' required></td>
                    </tr> 
                    <tr><td><input type='submit' form='addForm' value='Add Category'></td></tr>
                </table>";
        echo "<h3>Category Administration</h3>";
        echo $table;
    }

?>