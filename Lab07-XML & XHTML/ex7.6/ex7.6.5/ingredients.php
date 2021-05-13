<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X Marks The Spot</title>
</head>
<body>
    <?php 
    echo "<h3>First Way</h3>";
    // set name of XML file 
    $file = "ingredients.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // get all the <desc> elements and print 
    foreach ($xml->xpath('//desc') as $desc) { 
        echo "$desc<br>"; 
    } 

    ?> 

    <?php 
    echo "<h3>Second Way</h3>";
    // set name of XML file 
    $file = "ingredients.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // get all the <desc> elements and print 
    foreach ($xml->xpath('//item[quantity > 1]/desc') as $desc) { 
        echo "$desc<br>"; 
    } 

    ?> 

</body>
</html>