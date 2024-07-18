<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data['accion'] === 'renombrar') {
        if (file_exists('datosback.json')) {
            $newName = 'datosback_' . date('Y-m-d_H-i-s') . '.json';
            rename('datosback.json', $newName);
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'El archivo no existe']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Acción no válida']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
