<?php
// reflected_xss.php
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Recherche (Reflected Server XSS)</h2>
    <form method="get" action="">
        <input type="text" name="search" placeholder="Recherche...">
        <input type="submit" value="Rechercher">
    </form>

    <?php
    if (isset($_GET['search'])) {
        echo "Résultats de recherche pour: " . $_GET['search'];
    }
    ?>
</body>
</html>
