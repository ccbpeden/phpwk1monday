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

    function worthBuying($max_price, $max_mileage)
    {
        if(($this->price < $max_price)&&($this->miles < $max_mileage))
        {
            return $this->price;
        }
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

    function getCarImgPath()
    {
        return $this->car_img_path;
    }
}

$porsche = new Car('2014 Porsch 911', 114991, 14241, '/../img/car1.jpg');
$ford = new Car('2011 Ford F450', 55995, 14241, '/../img/car2.jpg');
$lexus = new Car('2103 Lexus RX 350', 44700, 20000, '/../img/car3.jpg');
$mercedes = new Car('Mercedes Benz CLS550', 39900, 37979, '/../img/car4.jpg');



?>
