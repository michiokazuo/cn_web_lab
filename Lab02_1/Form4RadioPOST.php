<!DOCTYPE html>
<html lang="en">
<head>
    <title>A simple form</title>
</head>
<body>
    <?php
      if(isset($_POST['email']) && isset($_POST['contact'])) {
        $email = $_POST["email"];
        $contact = $_POST["contact"];

        print ("<br> Your email is: $email");
        print ("<br> Contact preference is: $contact");
      }
    ?>
</body>
</html>