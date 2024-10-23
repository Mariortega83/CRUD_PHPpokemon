<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['user'])) {
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

if (isset($_POST['id'], $_POST['name'], $_POST['type'], $_POST['evolutions'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $evolutions = $_POST['evolutions'];

    $sql = "UPDATE pokemon SET name = :name, type = :type, evolutions = :evolutions WHERE id = :id";
    $statement = $connection->prepare($sql);

    $parameters = [
        ':id' => $id,
        ':name' => $name,
        ':type' => $type,
        ':evolutions' => $evolutions,

    ];

    try {
        $statement->execute($parameters);
        header('Location: .?op=editpokemon&result=success');
    } catch(PDOException $e) {
        header('Location: .?op=editpokemon&result=fail');
    }
} else {
    header('Location: .?op=editpokemon&result=invalid');
}

?>
