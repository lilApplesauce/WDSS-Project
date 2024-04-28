<?php
require_once '../config.php'; //OBSOLETE I THINK, DONT USE
try {
    $connection = new PDO($host, $username, $password, $options);
    echo 'DB connected';
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>