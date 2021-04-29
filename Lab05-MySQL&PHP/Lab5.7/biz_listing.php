<!DOCTYPE html>
<html>
<head>
    <style>
        .main {
            display: flex;
        }
        .list_cat {
            margin: 10px 20px 10px 30px;
        }
        .biz_list {
            margin-top: 50px;
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
    <h1>Business Listing</h1>
    <div class="main">
        <div class="list_cat"> 
            <form action="biz_listing.php" method="POST">
                <h3>Choose a category to find the business listing: </h3>
                <?php
                include "../Config/config5_567.php";
                $server = SERVER;
                $user = USERNAME;
                $pass = PASSWORD;
                $mydb = DB_NAME;
                $cat_tab = 'Categories';

                $catid;
                $cnt = 0;

                $mysqli = new mysqli($server, $user, $pass, $mydb);

                $query = "SELECT * FROM $cat_tab";
                if ($result = $mysqli->query($query)) {

                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()) {
                        $cnt++;
                    }
                    $result->free();
                }
                if ($result = $mysqli->query($query)) {

                    /* fetch associative array */
                    while ($row = $result->fetch_assoc()) {
                        $catname = $row["Title"];
                        $catid = $row["ID_Category"];
                        echo 
                            '<a id="'.$catid.'" href="biz_listing.php?id='.$catid.'">'.$catname.'</a></option> <br>';
                    }
                    $result->free();
                }
                ?>
            </form>
        </div>
            
        <div class="biz_list">
            <table border="1">
                <tr>
                    <th>Business ID </th>
                    <th>Business Name </th>
                    <th>Address </th>
                    <th>City </th>
                    <th>Number phone </th>
                    <th>URL </th>
                </tr>
                <?php
               
                $server = SERVER;
                $user = USERNAME;
                $pass = PASSWORD;
                $mydb = DB_NAME;
                $biz_tab = 'Businesses';
                $cat_tab = 'Categories';
                $biz_cat = 'Biz_categories';
              
                $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $parts = parse_url($actual_link);
            
                if(isset($parts['query'])) {
                    parse_str($parts['query'], $query);
                
                    if($query['id'] != '') {
                        $cat_selected = $query['id'];

                        if ($cat_selected != "") {
                            $mysqli = new mysqli($server, $user, $pass, $mydb);
                            $query1 = "use $mydb";
                            mysqli_query($mysqli, $query1);

                            $query2 = "SELECT $biz_tab.*, $biz_cat.*
                                        FROM $biz_tab JOIN $biz_cat
                                        ON $biz_tab.ID_Business = $biz_cat.ID_Business
                                        WHERE $biz_cat.ID_Category LIKE '$cat_selected'";
                    
                            if ($result = $mysqli->query($query2)) {
                                while ($row = $result->fetch_assoc()) {
                                    $cnt = $row["ID_Business"];
                                    $name = $row["Name"];
                                    $address = $row["Address"];
                                    $city = $row["City"];
                                    $number = $row["Telephone"];
                                    $url = $row["URL"];
                                    echo
                                        '<tr>
                                            <td>' . $cnt . '</td>
                                            <td>' . $name . '</td> 
                                            <td>' . $address . '</td> 
                                            <td>' . $city . '</td> 
                                            <td>' . $number . '</td> 
                                            <td>' . $url . '</td> 
                                        </tr>';
                                }
                            }
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>