<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// crear api de tareas en php


echo json_encode(array(
    array('id' => 1, 'nombre' => 'Aprender PHP', 'completada' => false),
    array('id' => 2, 'nombre' => 'Aprender JavaScript', 'completada' => false),
    array('id' => 3, 'nombre' => 'Aprender React', 'completada' => false),
    array('id' => 4, 'nombre' => 'Aprender Vue', 'completada' => false),
    array('id' => 5, 'nombre' => 'Aprender Angular', 'completada' => false),
    array('id' => 6, 'nombre' => 'Aprender Node', 'completada' => false),
    array('id' => 7, 'nombre' => 'Aprender Express', 'completada' => false),
    array('id' => 8, 'nombre' => 'Aprender MongoDB', 'completada' => false),
    array('id' => 9, 'nombre' => 'Aprender MySQL', 'completada' => false),
    array('id' => 10, 'nombre' => 'Aprender Python', 'completada' => false),
    array('id' => 11, 'nombre' => 'Aprender Django', 'completada' => false),
    array('id' => 12, 'nombre' => 'Aprender Flask', 'completada' => false),
    array('id' => 13, 'nombre' => 'Aprender Java', 'completada' => false),
    array('id' => 14, 'nombre' => 'Aprender Spring', 'completada' => false),
    array('id' => 15, 'nombre' => 'Aprender Kotlin', 'completada' => false),
    array('id' => 16, 'nombre' => 'Aprender Swift', 'completada' => false),
    array('id' => 17, 'nombre' => 'Aprender iOS', 'completada' => false),
    array('id' => 18, 'nombre' => 'Aprender Android', 'completada' => false),
    array('id' => 19, 'nombre' => 'Aprender Flutter', 'completada' => false),
));