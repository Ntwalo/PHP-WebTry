<?php
require 'vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)->withServiceAccount('path/to/firebase_credentials.json');
$auth = $factory->createAuth();

$data = json_decode(file_get_contents('php://input'), true);
$idToken = $data['idToken'];

try {
    $verifiedIdToken = $auth->verifyIdToken($idToken);
    $uid = $verifiedIdToken->claims()->get('sub');

    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['uid'] = $uid;

    http_response_code(200);
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['error' => $e->getMessage()]);
}
?>

