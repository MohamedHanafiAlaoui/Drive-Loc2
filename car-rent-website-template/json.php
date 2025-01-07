<?php
require("../src/class/car.php");

$Car = new Car();


$Cars = $Car->viewCar();


$DATA = [];


if ($Cars !== false) {
    $DATA['status'] = 'success';
    $DATA['data'] = $Cars; 
} else {
    $DATA['status'] = 'error';
    $DATA['message'] = 'Unable to fetch car data.';
}


// header('Content-Type: application/json');

echo json_encode($DATA);



