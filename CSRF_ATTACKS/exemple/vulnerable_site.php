<?php
// Simulons une vérification de session utilisateur
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement du formulaire
    $message = $_POST['message'];

    // Assurons-nous que le message n'est pas vide
    if (!empty($message)) {
        // Sécurisons le message pour éviter la sauvegarde de contenu malveillant
        $safeMessage = htmlspecialchars($message);

        // Stockons le message dans un fichier texte
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
    <title>Formulaire Vulnérable CSRF</title>
</head>
<body>
    <form method="post" action="">
        <label for="message">Votre message :</label>
        <textarea name="message" id="message"></textarea>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
