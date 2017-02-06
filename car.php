<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $car_img;

    function __construct($make_model, $price, $miles, $car_img_path)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->car_img_path = $car_img_path;
    }

    function worthBuying($max_price)
    {
        return $this->price < ($max_price + 100)
    }

    function setPrice($new_price)
    {
        $float_price = (float) $new_price;
        if ($float_price != 0) {
          $formatted_price = number_format($float_price, 2);
            $this->price = $formatted_price;
        }
    }

    function getPrice()
    {
        return $this->price;
    }

    function getMake_model()
    {
        return $this->make_model;
    }

    function getMiles()
    {
        return $this->miles;
    }
}

$porsche = new Car("2014 Porsch 911", 114991, 14241);
$ford = new Car("2011 Ford F450", 55995, 14241);
$lexus = new Car("2103 Lexus RX 350", 44700, 20000);
$mercedes = new Car("Mercedes Benz CLS550", 39900, 37979);

$cars = array($porsche, $ford, $lexus, $mercedes);

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->worthBuying($_GET['price'])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                echo "<li> $car->make_model </li>";
                echo "<ul>";
                    echo "<li> $$car->price </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
