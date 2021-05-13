<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sin City</title>
</head>
<body>
    <?php 
    echo "<h3>First Way</h3>";
    // set name of XML file 
    $file = "sins.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // access each <sin> 
    echo $xml->sin[0] . "<br>"; 
    echo $xml->sin[1] . "<br>"; 
    echo $xml->sin[2] . "<br>"; 
    echo $xml->sin[3] . "<br>"; 
    echo $xml->sin[4] . "<br>"; 
    echo $xml->sin[5] . "<br>"; 
    echo $xml->sin[6] . "<br>"; 
    ?> 

    <?php 
    echo "<h3>Second Way</h3>";
    // set name of XML file 
    $file = "sins.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // iterate over <sin> element collection 
    foreach ($xml->sin as $sin) { 
        echo "$sin<br>"; 
    } 
    ?> 

</body>
</html>