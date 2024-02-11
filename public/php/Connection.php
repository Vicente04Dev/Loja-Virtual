<?php

try{

    $connection = new mysqli('localhost', 'root', '', 'aula_php');

}catch(Exception $e){
    echo "Falha: ".$e->getMessage();
}
