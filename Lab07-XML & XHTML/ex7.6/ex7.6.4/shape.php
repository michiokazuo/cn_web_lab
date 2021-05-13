<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Shape of Things to Come</title>
</head>
<body>
    <?php

    // create XML string
    $str = <<< XML
    <?xml version="1.0"?>
    <shapes>
        <shape type="circle" radius="2" />
        <shape type="rectangle" length="5" width="2" />
        <shape type="square" length="7" />
    </shapes>
    XML;
    // load string
    $xml = simplexml_load_string($str) or die ("Unable to load XML string!");

    // for each shape
    // calculate area
    foreach ($xml->shape as $shape) {
        $name_shape = $shape['type'];
        if ($shape['type'] == "circle") {
            $area = pi() * $shape['radius'] * $shape['radius'];
        }
        elseif ($shape['type'] == "rectangle") {
            $area = $shape['length'] * $shape['width'];
        }
        elseif ($shape['type'] == "square") {
            $area = $shape['length'] * $shape['length'];
        }
        echo "Area <strong>" . $name_shape . ":</strong> " . $area . "<br>";
    }

    ?>

</body>
</html>