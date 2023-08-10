<?php
// Démarrez une nouvelle session ou reprenez une session existante
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['user'])) {
    // Rediriger vers la page d'accueil
    header('Location: index.php');
    exit; // On arrête l'exécution du script après une redirection.
}

// Inclure le fichier de connexion
require_once '../09_mysql/connexion.php';

// Initialisation du message d'erreur
$errorMessage = "";

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SELECT pour trouver l'utilisateur correspondant à l'email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':email', $email);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // On Vérifie si un utilisateur a été trouvé et si le mot de passe est correct
    if ($user && password_verify($password, $user['password'])) {
        // On stocke les informations de l'utilisateur dans la session
        $_SESSION['user'] = $user;
        // Rediriger vers la page d'accueil
        header('Location: index.php');
        exit; // Assurez-vous d'arrêter l'exécution du script après une redirection.
    } else {
        // Message d'erreur si les informations de connexion sont incorrectes
        $errorMessage = '<p class="message error">L\'email ou le mot de passe est incorrect.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
     <title>Connexion</title>
     <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
     <?php require_once 'nav.php'; ?>

     <div class="main-content">
          <h1>Connexion</h1>

          <?php if ($errorMessage): ?>
          <div class="error-message"><?php echo $errorMessage; ?></div>
          <?php endif; ?>
          
          <form method="POST">
               <div>
                    <label for="email">Email :</label>
                    <input type="email" name="email" id="email" required>
               </div>
               <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" name="password" id="password" required>
               </div>
               <div>
                    <input type="submit" value="Se connecter">
               </div>
               <div class="link-register">
                    <p style="text-align:center">Vous n'avez pas de compte? <a href="add.php">Inscrivez-vous</a></p>
               </div>
          </form>
     </div>
</body>
</html>
