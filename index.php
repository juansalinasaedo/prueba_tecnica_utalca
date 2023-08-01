<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Login - API</title>
</head>
<body>
    <h1>Sistema de Login - API</h1>

    <?php
    session_start();

    require_once 'functions.php';

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    // URL base de la API externa (MockAPI)
    $apiBaseUrl = 'https://64c91dd9b2980cec85c1ef1a.mockapi.io/usuario'; // Reemplaza con tu URL base de MockAPI

    switch ($action) {
        case 'login':
            header('Content-Type: application/json');
            handleLogin();
            break;
        case 'me':
            header('Content-Type: application/json');
            requireAuth();
            break;
        case 'new':
            header('Content-Type: application/json');
            handleNew();
            break;
        case 'delete':
            header('Content-Type: application/json');
            handleDelete();
            break;
        case 'logout':
            header('Content-Type: application/json');
            handleLogout();
            break;
        case 'list':
            header('Content-Type: application/json');
            handleList();
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Bienvenido al servicio de login.']);
    }

    // Función para verificar el token JWT en las solicitudes protegidas
    function requireAuth()
    {
        $token = getTokenFromHeader();
        if (!$token) {
            echo json_encode(['success' => false, 'message' => 'No se ha proporcionado un token válido.']);
            return;
        }

        try {
            JWT::decode($token, 'secret_key', array('HS256'));
            handleMe(); // Si el token es válido, se llama a handleMe() para obtener los datos del usuario
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Token inválido o expirado.']);
        }
    }
    ?>
</body>
</html>
