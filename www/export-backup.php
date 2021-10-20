<?php
$file = "pharmacie.db";
$exp_path = getenv('HOMEDRIVE') . getenv("HOMEPATH") . "\Desktop";
$path = "$exp_path\\Database.db";

// Header content type

// Read the file
copy($file, $path);
?>
<div align="center">
    <h3>
        <big><strong>🔔</strong></big> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Votre Base de donnée a bien été exporté ✅ <br><small> Sur votre bureau sous le nom de </small><strong>Database.db</strong>
    </h3>
</div>
<hr>
<div align="center">
    <h4>L'avez-vous trouver?</h4>
    <a class="btn btn-danger" href="php/reveal-dasktop.php?header=export-backup">NON, Ouvrir mon bureau 🤔!</a>
    <a class="btn btn-primary" href="?pg=backup">Merci, Je l'ais trouvé 🙂!</a>
</div>