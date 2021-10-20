<?php
$pg = $_GET['header'];
$exp_path = getenv('HOMEDRIVE') . getenv("HOMEPATH") . "\Desktop";
exec("EXPLORER /E, $exp_path");
header("location: ../main.php?pg=$pg");
