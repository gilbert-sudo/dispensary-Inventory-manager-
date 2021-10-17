<?php
$exp_path = getenv('HOMEDRIVE') . getenv("HOMEPATH") . "\Desktop";
exec("EXPLORER /E, $exp_path");
header('location: ../main.php?pg=export');