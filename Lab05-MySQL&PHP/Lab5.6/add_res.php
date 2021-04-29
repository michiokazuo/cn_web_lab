<!DOCTYPE html>
<html>

<head>
    <style>
        .main {
            display: flex;
        }
        .list_cat, form_biz {
            margin: 10px 20px 10px 30px;
        }
        .submit {
            margin-left: 20px;
            margin-top: 20px;
        }
        h1 {
            color: blue;
        }
    </style>
</head>

<body>
    <h1>Business Registration</h1>
    <form action="add_res.php" method="POST">
        <div class="main">
            <div class="list_cat">
                <select name="cat" size="5" multiple="multiple" required>  
                    <?php
                    include "../Config/config5_567.php";
                    $server = SERVER;
                    $user = USERNAME;
                    $pass = PASSWORD;
                    $mydb = DB_NAME;
                    $table = 'Categories';
                    
                    $cat_selected = $_POST['cat'];

                    $mysqli = new mysqli("localhost", $user, $pass, $mydb);

                    $query = "SELECT * FROM $table";
                    if ($result = $mysqli->query($query)) {

                        /* fetch associative array */
                        while ($row = $result->fetch_assoc()) {
                            $catid = $row["ID_Category"];
                            if($catid == $cat_selected) {
                                echo
                                    '<option value="'. $catid .'" name="'.$catid.'" id="'.$catid.'" selected>'.$row["Title"].'</option>';
                            } else {
                                echo
                                    '<option value="'. $catid .'" name="'.$catid.'" id="'.$catid.'">'.$row["Title"].'</option>';
                            }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form_biz">
                <table>
                    <?php 
                        $server = SERVER;
                        $user = USERNAME;
                        $pass = PASSWORD;
                        $mydb = DB_NAME;
                        $biz_tab = 'Businesses';
                        $biz_cat = 'Biz_categories';
                        
                        $cat_selected = $_POST['cat'];

                        $cnt = 1;
                        
                        $mysqli = new mysqli($server, $user, $pass, $mydb);

                        $query = "SELECT * FROM $biz_tab";
                        if ($result = $mysqli->query($query)) {
                            while ($row = $result->fetch_assoc()) {
                                $cnt++;
                            }
                            $result->free();
                        }
                        $biz_id = $cnt;

                        $biz_name = $_POST['biz_name'];
                        $address = $_POST['address'];
                        $city = $_POST['city'];
                        $number = $_POST['number'];
                        $url = $_POST['url'];

                        $connect = mysqli_connect($server, $user, $pass);
                        if (!$connect) {
                            die("Cannot connect to $server using $user");
                        } else {
                            $query1 = "INSERT INTO $biz_tab
                                    VALUES ('$biz_id', '$biz_name', '$address', '$city', '$number', '$url')";
                            $query2 = "INSERT INTO $biz_cat
                            VALUES ('$biz_id', '$cat_selected')";
                            mysqli_select_db($connect, $mydb);
                            mysqli_query($connect, $query1);
                            mysqli_query($connect, $query2);
                            mysqli_close($connect);
                        }

                        echo 
                            '<tr>
                                <td>Business name: </td>
                                <td>'.$biz_name.'</td>
                            </tr>
                            <tr>
                                <td>Address: </td>
                                <td>'.$address.'</td>
                            </tr>
                            <tr>
                                <td>City: </td>
                                <td>'.$city.'</td>
                            </tr>
                            <tr>
                                <td>Telephone: </td>
                                <td>'.$number.'</td>
                            </tr>
                            <tr>
                                <td>URL: </td>
                                <td>'.$url.'</td>
                            </tr>';
                    ?>
                </table>
            </div>
        </div>
    </form>
        
    <a href="add_biz.php">Add another Business</a>
</body>

</html>