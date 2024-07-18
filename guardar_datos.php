<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = file_get_contents('php://input');
    if (file_put_contents('datosback.json', $datos) !== false) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al guardar los datos']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}