<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petting Zoo</title>
</head>

<body>
    <?php 
    echo "<h3>First Read</h3>";
    // set name of XML file 
    $file = "pet.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // access XML data 
    echo "Name: " . $xml->name . "<br>"; 
    echo "Age: " . $xml->age . "<br>"; 
    echo "Species: " . $xml->species . "<br>"; 
    echo "Parents: " . $xml->parents->mother . " and " .  $xml->parents->father . "<br>"; 
    ?>

    <?php 
    // set name of XML file 
    $file = "pet.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // modify XML data 
    $xml->name = "Sammy Snail"; 
    $xml->age = 4; 
    $xml->species = "snail"; 
    $xml->parents->mother = "Sue Snail"; 
    $xml->parents->father = "Sid Snail"; 

    // write new data to file 
    file_put_contents($file, $xml->asXML()); 
    ?> 

    <?php 
    echo "<h3>After writing </h3>";
    // set name of XML file 
    $file = "pet.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // access XML data 
    echo "Name: " . $xml->name . "<br>"; 
    echo "Age: " . $xml->age . "<br>"; 
    echo "Species: " . $xml->species . "<br>"; 
    echo "Parents: " . $xml->parents->mother . " and " .  $xml->parents->father . "<br>"; 
    ?>
    
    <?php 
    // set name of XML file 
    $file = "pet.xml"; 

    // load file 
    $xml = simplexml_load_file($file) or die ("Unable to load XML file!"); 

    // modify XML data 
    $xml->name = "Polly Parrot"; 
    $xml->age = 3; 
    $xml->species = "parrot"; 
    $xml->parents->mother = "Pia Parrot"; 
    $xml->parents->father = "Peter Parrot"; 

    // write new data to file 
    file_put_contents($file, $xml->asXML()); 
    ?> 
</body>

</html>