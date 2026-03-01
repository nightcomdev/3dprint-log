<?php
// Plik do zapisu danych - bardzo prosty i niezawodny
header('Content-Type: application/json');

$dataFile = __DIR__ . '/maintenance.json';

// Obsługa GET - pobierz dane
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['get'])) {
    if (file_exists($dataFile)) {
        $content = file_get_contents($dataFile);
        echo $content;
    } else {
        echo '[]';
    }
    exit;
}

// Obsługa POST - zapisz dane
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');
    
    // Sprawdź czy dane są poprawne
    $data = json_decode($input, true);
    if ($data === null) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON']);
        exit;
    }
    
    // Zapisz do pliku
    $result = file_put_contents($dataFile, $input);
    
    if ($result !== false) {
        // Ustaw uprawnienia
        chmod($dataFile, 0666);
        echo json_encode(['success' => true, 'saved' => count($data)]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Cannot write file']);
    }
    exit;
}

// Inne metody
http_response_code(405);
echo json_encode(['error' => 'Method not allowed']);
?>