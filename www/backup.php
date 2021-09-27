<?php

// Incluindo o autoload do Composer para carregar a biblioteca
require_once 'vendor/autoload.php';

// Incluindo a classe que criamos
require_once 'classes/Backup.php';

// Como a geração do backup pode ser demorada, retiramos
// o limite de execução do script
set_time_limit(0);

// Utilizando a classe para gerar um backup na pasta 'backups'
// e manter os últimos dez arquivos
$backup = new Backup('backups', 6);
$backup->setDatabase('localhost', 'farmacia', 'root', '');
$backup->generate();

//Zip

$fileName  = 'backup.zip';
$path      = __DIR__ . '/backups';
$fullPath  = $path.'/'.$fileName;
// Leitura no diretório para coletar os nomes dos arquivos.
$scanDir = scandir($path);
// Removendo os 02 primeiros indices do array, referente ao (.) e (..).
array_shift($scanDir);
array_shift($scanDir);
$zip = new \ZipArchive();
// Criamos o arquivo e verificamos se ocorreu tudo certo
if( $zip->open($fullPath, \ZipArchive::CREATE) ){
    // adiciona ao zip todos os arquivos contidos no diretório.
    foreach($scanDir as $file){
        $zip->addFile($path.'/'.$file, $file);
    }
    // fechar o arquivo zip após a inclusão dos arquivos desejados
    $zip->close();
}
// Primeiro nos certificamos de que o arquivo zip foi criado.
if(file_exists($fullPath)){
    // Forçamos o donwload do arquivo.
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="'.$fileName.'"');
    readfile($fullPath);
    //removemos o arquivo zip após download
    unlink($fullPath);
}

