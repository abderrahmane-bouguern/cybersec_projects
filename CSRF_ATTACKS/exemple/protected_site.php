<?php
session_start();

// Générer un token CSRF s'il n'existe pas déjà
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Vérifier le token CSRF lors de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le token CSRF est présent et correct
    if (!isset($_POST['csrf_token']) || $_SESSION['csrf_token'] !== $_POST['csrf_token']) {
        die("Erreur de sécurité: token CSRF invalide.");
    }

    // Traitement du formulaire
    $message = $_POST['message'];
    
    // Vérifier si le message n'est pas vide
    if (!empty($message)) {
        // Sécuriser le message pour éviter l'enregistrement de contenu malveillant
        $safeMessage = htmlspecialchars($message);

        // Stocker le message dans un fichier texte
        file_put_contents('messages.txt', $safeMessage . "\n", FILE_APPEND);
        echo "Votre message a été enregistré.";
    } else {
        echo "Le message ne peut pas être vide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Sécurisé CSRF</title>
</head>
<body>
    <form method="post" action="">
        <label for="message">Votre message :</label>
        <textarea name="message" id="message"></textarea>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
