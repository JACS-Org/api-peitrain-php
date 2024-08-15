<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// crear api de tareas en php

class Tarea {
    public $id;
    public $nombre;
    public $completada;

    public function __construct($id, $nombre, $completada) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->completada = $completada;
    }
}

$tareas = array(
    new Tarea(1, 'Aprender PHP', false),
    new Tarea(2, 'Aprender JavaScript', false),
);

// GET /api/tareas
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode($tareas);
}

// POST /api/tareas
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tarea = json_decode(file_get_contents('php://input'), true);
    $tareas[] = $tarea;
    echo json_encode($tareas);
}

// PUT /api/tareas?id=1
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $tarea = json_decode(file_get_contents('php://input'), true);
    $id = $_GET['id'];
    foreach ($tareas as $key => $value) {
        if ($value->id == $id) {
            $tareas[$key] = $tarea;
        }
    }
    echo json_encode($tareas);
}

// DELETE /api/tareas?id=1
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $id = $_GET['id'];
    unset($tareas[$id]);
    echo json_encode($tareas);
}