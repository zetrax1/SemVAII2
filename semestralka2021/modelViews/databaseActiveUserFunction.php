<?php

require_once "../models/databaseModel/databeseConnect.php";
require_once "../models/tableOsobaItem.php";
require_once "../models/tableAdresaItem.php";


function deleteOsobneUdaje($idOsoba)
{
    global $conn;

    $sql = 'CALL deleteOsoba(:uid)';

    $statement = $conn->prepare($sql);

    $statement->bindParam(':uid', $idOsoba, PDO::PARAM_STR);

    $statement->execute();

    unset($statement);
    unset($conn);
}

function getActualUdajeOsoba($osobaItem,$adresaItem)
{
    global $conn;
    global $userId;
    
    $userId = $_SESSION["id"];

    $sql = 'CALL getOsoba(:uid)';

    $statement = $conn->prepare($sql);

    $statement->bindParam(':uid', $userId, PDO::PARAM_STR);

    $statement->execute();

    if ($statement->rowCount() == 1) {
        if ($row = $statement->fetch()) {
            $osobaItem->setMeno($row["meno"]);
            $osobaItem->setPriezvisko( $row["priezvisko"]);
            $osobaItem->setEmail($row["email"]);
            $osobaItem->setAdresaId($row["adresaId"]);
        }
    }


    $AdrsId = $osobaItem->getAdresaId();

    $sql = 'CALL getAdresa(:uid)';

    $statement = $conn->prepare($sql);

    $statement->bindParam(':uid', $AdrsId, PDO::PARAM_INT);

    $statement->execute();

    if ($statement->rowCount() == 1) {
        if ($row = $statement->fetch()) {
            $adresaItem->setMesto($row["mesto"]);
            $adresaItem->setUlica( $row["ulica"]);
            $adresaItem->setPsc($row["popisneCislo"]);
        }
    }
}

function  updateOsoba($idOsoba,$osobaItem)
{
    global $conn;

    $osobaItem->setAll(htmlspecialchars(strip_tags( $_POST['meno'])),
                      htmlspecialchars(strip_tags($_POST['priezvisko'])),
                      htmlspecialchars(strip_tags($_POST['email'])));


    $meno = $osobaItem->getMeno();
    $priezvisko = $osobaItem->getPriezvisko();
    $email = $osobaItem->getEmail();

    $sql = 'CALL updateOsoba(:umeno,:upriezvisko,:uemail,:uid)';

    $statement = $conn->prepare($sql);
    $statement->bindParam(':umeno', $meno, PDO::PARAM_STR);
    $statement->bindParam(':upriezvisko', $priezvisko, PDO::PARAM_STR);
    $statement->bindParam(':uemail', $email, PDO::PARAM_STR);
    $statement->bindParam(':uid', $idOsoba, PDO::PARAM_INT);

     $statement->execute();
}

function  updateOsobaAdresa($idOsoba,$adresaItem)
{
    global $conn;

    $adresaItem->setAll(htmlspecialchars(strip_tags( $_POST['mesto'])),
                      htmlspecialchars(strip_tags($_POST['ulica'])),
                      htmlspecialchars(strip_tags($_POST['psc'])));


    $mesto = $adresaItem->getMesto();
    $ulica = $adresaItem->getUlica();
    $psc = $adresaItem->getPsc();

    $sql = 'CALL updateAdresaOsoby(:umesto,:uulica,:upsc,:uid)';

    $statement = $conn->prepare($sql);
    $statement->bindParam(':umesto', $mesto, PDO::PARAM_STR);
    $statement->bindParam(':uulica', $ulica, PDO::PARAM_STR);
    $statement->bindParam(':upsc', $psc, PDO::PARAM_INT);
    $statement->bindParam(':uid', $idOsoba, PDO::PARAM_INT);

    $statement->execute();
}


function updateOsobneUdaje()
{
    global $meno;
    global $priezvisko;
    global $email;
    global $conn;

    $heslo = $_POST['heslo'];
    $email =  $_POST['email'];

    $param_password = password_hash($heslo, PASSWORD_DEFAULT);

    $id = getOsobaID($email);

    $sql = 'CALL pridajHeslo(:uheslo,:uosobaId)';

    $statement = $conn->prepare($sql);

    $statement->bindParam(':uheslo', $param_password, PDO::PARAM_STR);
    $statement->bindParam(':uosobaId', $id, PDO::PARAM_STR);

    $statement->execute();
}


function  jetoMakler($userId)
{
    global $conn;

    $sql = 'CALL getZaradenie(:uid)';

    $statement = $conn->prepare($sql);

    $statement->bindParam(':uid', $userId, PDO::PARAM_INT);

    $statement->execute();


    if ($statement->rowCount() == 1) {
        if ($row = $statement->fetch()) {
            if($row["zaradenie"] == 1)
            {
                return true;
            }      
        }
    }

    return false;
}

?>