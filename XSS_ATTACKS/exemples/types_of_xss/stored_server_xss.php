<?php
// stored_xss.php
session_start();

$messageFile = 'messages.txt';

// Ajouter un message au fichier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['message'])) {
    file_put_contents($messageFile, $_POST['message'] . "\n", FILE_APPEND);
}

// Lire les messages existants
$messages = file_exists($messageFile) ? file($messageFile, FILE_IGNORE_NEW_LINES) : [];
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Livre d'or</h2>
    <form method="post" action="">
        <textarea name="message"></textarea>
        <input type="submit" value="Envoyer">
    </form>

    <h3>Messages:</h3>
    <div>
        <?php foreach ($messages as $message): ?>
            <p><?php echo $message; ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>