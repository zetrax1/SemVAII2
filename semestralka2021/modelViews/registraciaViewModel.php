<?php

require_once "../models/databaseModel/databeseConnect.php";
require_once "../models/tableOsobaItem.php";

function  registaciaFormularu($osobaItem)
{
    global $conn;

    $osobaItem->setAll(htmlspecialchars(strip_tags( $_POST['meno'])),
                      htmlspecialchars(strip_tags($_POST['priezvisko'])),
                      htmlspecialchars(strip_tags($_POST['email'])));


    $meno = $osobaItem->getMeno();
    $priezvisko = $osobaItem->getPriezvisko();
    $email = $osobaItem->getEmail();
    $heslo =  $_POST['heslo'];


    $sql = 'CALL pridajOsobuRegistracia(:umeno,:upriezvisko,:uemail)';

    $statement = $conn->prepare($sql);
    $statement->bindParam(':umeno', $meno, PDO::PARAM_STR);
    $statement->bindParam(':upriezvisko', $priezvisko, PDO::PARAM_STR);
    $statement->bindParam(':uemail', $email, PDO::PARAM_STR);

    $statement->execute();
}


function registruj()
{
    global $email;
    global $heslo;
    global $conn;

    $heslo = $_POST['heslo'];
    $email =  $_POST['email'];

    $param_password = crypt($heslo, $email);

    $id = getOsobaID($email);

    $sql = 'CALL pridajHeslo(:uheslo,:uosobaId)';

    $statement = $conn->prepare($sql);

    $statement->bindParam(':uheslo', $param_password, PDO::PARAM_STR);
    $statement->bindParam(':uosobaId', $id, PDO::PARAM_STR);

    $statement->execute();
}


?>