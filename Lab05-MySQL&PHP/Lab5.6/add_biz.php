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
                    $cat_tab = 'Categories';

                    $catid;

                    $mysqli = new mysqli("localhost", $user, $pass, $mydb);

                    $query = "SELECT * FROM $cat_tab";
                    if ($result = $mysqli->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                            $catid = $row["ID_Category"];
                            echo
                                '<option value="'. $catid .'" name="'.$catid.'" id="'.$catid.'">'.$row["Title"].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form_biz">
                <table>
                    <tr>
                        <td>Business name: </td>
                        <td><input type="text" name="biz_name" id="biz_name" required></td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td><input type="text" name="address" id="address" required pattern="[A-Za-z0-9'\.\-\s\, ]"></td>
                    </tr>
                    <tr>
                        <td>City: </td>
                        <td><input type="text" name="city" id="city" required pattern="^[a-zA-Z][a-zA-Z0-9-_\. ]{1,20}$"></td>
                    </tr>
                    <tr>
                        <td>Telephone: </td>
                        <td><input type="text" name="number" id="number" required pattern="[0]{1}[1-9]{1}[0-9]{4}[0-9]{4}"></td>
                    </tr>
                    <tr>
                        <td>URL: </td>
                        <td><input type="text" name="url" id="url" required></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <input type="submit" id="submit" name="submit" class="submit" value="Click to Submit">
        <input type="reset" class="submit" value="Cancel">
    </form>
</body>

</html>