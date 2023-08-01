<?php
require_once 'vendor/autoload.php'; // Carga la biblioteca JWT

use \Firebase\JWT\JWT; // Importa la clase JWT

// URL base de la API externa (MockAPI)
$apiBaseUrl = 'https://64c91dd9b2980cec85c1ef1a.mockapi.io/usuario'; // Reemplaza con tu URL base de MockAPI

// Resto del código...

function handleLogin()
{
    // Resto del código...

    if ($stmt->num_rows > 0) {
        $token = generateJWT($email); // Genera un JWT al hacer login
        echo json_encode(['success' => true, 'message' => 'Login exitoso.', 'token' => $token]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Credenciales inválidas.']);
    }

    // Resto del código...
}

function handleMe()
{
    // Verifica el token JWT antes de devolver los datos del usuario
    $token = getTokenFromHeader();
    if (!$token) {
        echo json_encode(['success' => false, 'message' => 'No se ha proporcionado un token válido.']);
        return;
    }

    try {
        $decodedToken = JWT::decode($token, 'secret_key', array('HS256')); // Verifica y decodifica el token
        $email = $decodedToken->email;

        // Obtén los datos del usuario desde la API externa (MockAPI)
        $userData = getUserFromAPI($apiBaseUrl, $email);

        if ($userData) {
            echo json_encode(['success' => true, 'data' => $userData]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Usuario no encontrado.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Token inválido o expirado.']);
    }
}

// Resto del código...

// Función para obtener los datos del usuario desde la API externa (MockAPI)
function getUserFromAPI($apiBaseUrl, $email)
{
    $url = $apiBaseUrl . '?correo=' . urlencode($email);

    // Realiza una solicitud GET a la API externa utilizando cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $userData = json_decode($response, true);

    return !empty($userData) ? $userData[0] : null;
}

// Resto del código...
