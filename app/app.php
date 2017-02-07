<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car</title>
        </head>
        <body>
            <div class='container'>
                <h1>Find a Car!</h1>
                <form action='/car_match'>
                    <div class='form-group'>
                        <label for='price'>Enter Maximum Price:</label>
                        <input id='price' name='price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='miles'>Enter Maximum Mileage:</label>
                        <input id='miles' name='miles' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Submit</button>
                </form>
            </div>
        </body>
        </html>
        ";
    });

    $app->get("/car_match", function() {

        $porsche = new Car('2014 Porsch 911', 114991, 14241, 'img/car1.jpg');
        $ford = new Car('2011 Ford F450', 55995, 14241, 'img/car2.jpg');
        $lexus = new Car('2103 Lexus RX 350', 44700, 20000, 'img/car3.jpg');
        $mercedes = new Car('Mercedes Benz CLS550', 39900, 37979, 'img/car4.jpg');

        $cars = array($porsche, $ford, $lexus, $mercedes);

        $cars_matching_search = array();
        foreach ($cars as $car) {
          if ($car->worthBuying($_GET['price'], $_GET['miles'])) {
            array_push($cars_matching_search, $car);
          };
        };

        if (empty($cars_matching_search)){
          return 'No cars match your requirements, you chintzy bastadge!';
        } else {
          foreach ($cars_matching_search as $car) {
            $car_make_model = $car->getMake_model();
            $car_price = $car->getPrice();
            $car_miles = $car->getMiles();
            return "<img src='$car->car_img_path'>
             <li> $car_make_model </li>
             <ul>
                 <li> $$car_price </li>
                 <li> Miles: $car_miles </li>
             </ul>";
           }
        };
    });

    return $app;
?>
