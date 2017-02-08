<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__ .'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('input.html.twig');
    });

    $app->get("/car_match", function() use ($app) {

      $porsche = new Car('2014 Porsch 911', 114991, 14241, '/../img/car1.jpg');
      $ford = new Car('2011 Ford F450', 55995, 14241, '/../img/car2.jpg');
      $lexus = new Car('2103 Lexus RX 350', 44700, 20000, '/../img/car3.jpg');
      $mercedes = new Car('Mercedes Benz CLS550', 39900, 37979, '/../img/car4.jpg');

      $cars = array($porsche, $ford, $lexus, $mercedes);

        $cars_matching_search = array();
        foreach ($cars as $car) {
          if ($car->worthBuying($_GET['price'], $_GET['miles'])) {
            array_push($cars_matching_search, $car);
          };
        };
          return $app['twig']->render('carmatch.html.twig', array(
            'returnCars' => $cars_matching_search));
    });

    return $app;
?>
