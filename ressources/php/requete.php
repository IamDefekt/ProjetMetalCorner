<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'connect.php';
require_once 'DAO/DAOMembre.php';
require_once 'controller/tools.php';

session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([ 'success' => false, 'errors' => ['global' => 'Requête invalide'] ]);
    exit;
}

$username = Tools::clearString($_POST['username'] ?? '');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

$dao = new DAOMembre();
$errors = [];
$action = $_POST['action'] ?? '';

    // ----------- INSCRIPTION -----------

    if ($action === 'signup') {

        if (!$username) { $errors['username'] = "Nom d'utilisateur invalide."; }
        if (!$email) { $errors['email'] = "Adresse email invalide."; }

        if (!empty($errors)) {
            echo json_encode([ 'success' => false, 'errors' => $errors ]);
            exit;
        }

        // Vérifie si pseudo déjà utilisé

        if ($dao->selectMembreByUsername($username)) { 
            echo json_encode(['success' => false, 'errors' => ['username' => "Ce nom d'utilisateur est déjà pris."]]);
        exit;
        }

        $mdpHash = Tools::hashPassword($password);
        $membre = new entiteMembre(0, $username, $email, $mdpHash);
        $dao->insertData($membre);

        echo json_encode(['success' => true, 'redirect' => '/view/login.php?success=1', 'message' => 'Inscription réussie']);
        exit;
    }

    // ----------- CONNEXION -----------

    elseif ( $action === 'login') {

        if (!$email || !$password) {
            echo json_encode(['success' => false, 'errors' => ['global' => 'Adresse email et mot de passe requis.']]);
            exit;
        }

        $membre = $dao->loginByEmail($email, $password);
        
        if ($membre) {
            $_SESSION['user'] = [
                'id'       => $membre->getIdUser(),
                'username' => $membre->getUsername(),
                'email'    => $membre->getEmail()
            ];

            echo json_encode(['success' => true, 'redirect' => '/view/compte.php']);
            exit;
        } else {
            echo json_encode(['success' => false, 'errors' => ['global' => "Nom d'utilisateur ou mot de passe incorrect."]]);
            exit;
        }

    } else {
        echo json_encode(['success' => false, 'errors' => ['global' => 'Requête invalide.']]);
        exit;
    }