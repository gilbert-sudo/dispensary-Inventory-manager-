<?php

function connect($path)
{
    try {
        $db = new PDO("sqlite:$path");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
    } catch (Exception $e) {
        echo '{"status":0, "line":'.__LINE__.'}';
        exit();
    }
    return $db;
}

function connect2($path)
{
    try {
        $db_2 = new PDO("sqlite:$path");
        $db_2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_2->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        
    } catch (Exception $e) {
        echo '{"status":0, "line":'.__LINE__.'}';
        exit();
    }
    return $db_2;
}