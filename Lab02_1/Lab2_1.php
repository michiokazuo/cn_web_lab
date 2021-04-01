<!DOCTYPE html>
<html lang="en">
<head>
    <title>Receive Data</title>
</head>
<body>
    <p size=5>Thank you: Got your input</p>
    <?php
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $class = $_POST["class"];
        $university = $_POST["university"];
        $gender = $_POST["gender"];
        $hobbies = $_POST["hobbies"];

        if ($firstName != "" || $lastName != "")
            print "Your name is $firstName $lastName <br>";
        
        print "Gender: $gender <br>";

        if ($class != "") {
            if ($university != "")
                print "Learn in class $class at $university <br>";
            else print "Learn in class $class";
        } else if ($university != "") print "Learn at $university <br>";
        
        if (count($hobbies) != 1 && $hobbies[0] != "") {
            print "Hobbies are: ";

            foreach($hobbies as $hobby) {
                print " $hobby, ";
            }
        }
    ?>
</body>
</html>