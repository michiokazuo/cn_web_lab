<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple form</title>
</head>
<body>
    <?php
       if(isset($_GET['email']) && isset($_GET['contact'])) {
            $email = $_GET["email"];
            $contact = $_GET["contact"];

            print ("<br> Your email is: $email");
            print ("<br> Contact preference is: $contact");
       }
    ?>
</body>
</html>