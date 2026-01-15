<?php
require_once 'connect.php';
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'errors' => ['global' => 'Requête invalide']
    ]);
    exit;
}

$username        = trim($_POST['username'] ?? '');
$password        = trim($_POST['password'] ?? '');
$confirmPassword = trim($_POST['password2'] ?? '');
$email           = trim($_POST['email'] ?? '');
$cgu             = isset($_POST['cgu']);

$connect = new Connect();
$pdo = $connect->connect();

$errors = [];

// Inscription

$action = $_POST['action'] ?? '';

if ($action === 'signup' ) { 

    if (!$username) {
        $errors['username'] = "Veuillez saisir un nom d'utilisateur.";
    }
    if (!$email) {
        $errors['email'] = "Veuillez saisir une adresse email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email invalide.";
    }
    if (!$password) {
        $errors['password'] = "Veuillez saisir un mot de passe.";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Le mot de passe doit avoir au moins 8 caractères.";
    }
    if ($password !== $confirmPassword) {
        $errors['password2'] = "Les mots de passe ne correspondent pas.";
    }
    if (!$cgu) {
        $errors['cgu'] = "Vous devez accepter les CGU.";
    }

    // Vérifie si le pseudo existe déjà
    if ($username) {
        $stmt = $pdo->prepare("SELECT idUser FROM membre WHERE pseudo = :pseudo");
        $stmt->bindParam(':pseudo', $username);
        $stmt->execute();
        if ($stmt->fetch()) {
            $errors['username'] = "Ce nom d'utilisateur est déjà pris.";
        }
    }

    if (!empty($errors)) {
        echo json_encode([
            'success' => false,
            'errors' => $errors
        ]);
        exit;
    }

    // Création du compte
    $mdpHash = password_hash($password, PASSWORD_DEFAULT);
    $insert = $pdo->prepare(
        "INSERT INTO membre (pseudo, mdp, email, dateInscription)
         VALUES (:pseudo, :mdp, :email, NOW())"
    );
    $insert->bindParam(':pseudo', $username);
    $insert->bindParam(':mdp', $mdpHash);
    $insert->bindParam(':email', $email);
    $insert->execute();

    echo json_encode([
        'success' => true,
        'redirect' => '/view/login.php?success=1'
    ]);
    exit;
}

elseif ( $action === 'login') {

    $loginEmail = trim($_POST['loginEmail'] ?? '');
    $loginPw    = trim($_POST['loginPw'] ?? '');

    // Connexion
    if (!$loginEmail || !$loginPw) {
        echo json_encode([
            'success' => false,
            'errors' => ['global' => 'Adresse email et mot de passe requis.']
        ]);
        exit;
    }

    $stmt = $pdo->prepare("SELECT * FROM membre WHERE email = :email");
    $stmt->bindParam(':email', $loginEmail);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($loginPw, $user['mdp'])) {
        $_SESSION['user'] = [
            'id'     => $user['idUser'],
            'pseudo' => $user['pseudo'],
            'email'  => $user['email']
        ];

        echo json_encode([
            'success' => true,
            'redirect' => '/view/compte.php'
        ]);
        exit;
    } else {
        echo json_encode([
            'success' => false,
            'errors' => ['global' => 'Pseudo ou mot de passe incorrect.']
        ]);
        exit;
    }

} else { 

    echo json_encode([
        'success' => false,
        'errors' => ['global' => 'Requête invalide.']
    ]);
    exit;
}