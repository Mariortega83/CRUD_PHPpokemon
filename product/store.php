<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['user'])) {
    header('Location:.');
    exit;
}

try {
    $connection = new PDO(
      'mysql:host=localhost;dbname=pokemons',
      'pikachu',
      'ScarBasica12#',
     
      array(
        PDO::ATTR_PERSISTENT => true,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set names utf8')
        
    );
} catch(PDOException $e) {
    header('Location:..');
    exit;
}
$resultado = 0;
$url = 'create.php?op=insertpokemon&result=' . $resultado;

if (isset($_POST['name']) && isset($_POST['type']) && isset($_POST['evolutions'])) {
    $name = trim($_POST['name']);
    $type = $_POST['type'];
    $evolutions = $_POST['evolutions'];

    $ok = true;

    if (strlen($name) < 2 || strlen($name) > 100) {
        $ok = false;
    }
    if (strlen($type) < 3 || strlen($type) > 50) {
        $ok = false;
    }
    if (!(is_numeric($evolutions) && $evolutions > 0 && $evolutions <= 9999)) {
        $ok = false;
    }


    if ($ok) {
        $sql = 'INSERT INTO pokemon (name, type, evolutions) VALUES (:name, :type, :evolutions)';
        $sentence = $connection->prepare($sql);
        $parameters = [
            'name' => $name,
            'type' => $type,
            'evolutions' => $evolutions,
        ];

        foreach ($parameters as $nombreParametro => $valorParametro) {
            $sentence->bindValue($nombreParametro, $valorParametro);
        }

        try {
            $sentence->execute();
            $resultado = $connection->lastInsertId();
            $url = 'index.php?op=insertpokemon&result=' . $resultado;
        } catch (PDOException $e) {
            
            
        }
    }
}

// Guardo los datos antiguos en la sesión
if ($resultado == 0) {
    $_SESSION['old']['name'] = $name;
    $_SESSION['old']['type'] = $type;
    $_SESSION['old']['evolutions'] = $evolutions;

}

header('Location: ' . $url);
