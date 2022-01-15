<?php

require_once "../models/databaseModel/databeseConnect.php";
require_once "../models/tableOsobaItem.php";
require_once "../models/tableAdresaItem.php";
require_once "../models/tableNehnutelnostItem.php";



function  insertNehnutelnost($idOsoba,$nehnutelnostItem,$adresaItem,$osobaItem)
{
    global $conn;

    
    $nehnutelnostItem->setAll( htmlspecialchars(strip_tags( $_POST['nazov'])),
                      htmlspecialchars(strip_tags((int)$_POST['typ'])),
                      htmlspecialchars(strip_tags($_POST['popis'])));

    
    $osobaItem->setAll(htmlspecialchars(strip_tags( $_POST['meno'])),
                      htmlspecialchars(strip_tags($_POST['priezvisko'])),
                      htmlspecialchars(strip_tags($_POST['email'])));


    $adresaItem->setAll(htmlspecialchars(strip_tags( $_POST['mesto'])),
                      htmlspecialchars(strip_tags($_POST['ulica'])),
                      htmlspecialchars(strip_tags($_POST['popisne_cislo'])));

    $nazov = $nehnutelnostItem->getNazov();
    $typ = $nehnutelnostItem->getTyp();
    $popis = $nehnutelnostItem->getPopis();

    $meno = $osobaItem->getMeno();
    $priezvisko = $osobaItem->getPriezvisko();
    $email = $osobaItem->getEmail();

    echo $email;
    $mesto = $adresaItem->getMesto();
    $ulica = $adresaItem->getUlica();
    $psc = $adresaItem->getPsc();

    $sql = 'CALL pridajNehnutelnost(:uidMakler,:unazov,:utyp,:upopis,:umesto,:uulica,:upsc,:umeno,:upriezvisko,:uemail)';

    $statement = $conn->prepare($sql);
    $statement->bindParam(':uidMakler', $idOsoba, PDO::PARAM_INT);
    $statement->bindParam(':unazov', $nazov, PDO::PARAM_STR);
    $statement->bindParam(':utyp', $typ, PDO::PARAM_INT);
    $statement->bindParam(':upopis', $popis, PDO::PARAM_STR);
    $statement->bindParam(':umesto', $mesto, PDO::PARAM_STR);
    $statement->bindParam(':uulica', $ulica, PDO::PARAM_STR);
    $statement->bindParam(':upsc', $psc, PDO::PARAM_INT);
    $statement->bindParam(':umeno', $meno, PDO::PARAM_STR);
    $statement->bindParam(':upriezvisko', $priezvisko, PDO::PARAM_STR);
    $statement->bindParam(':uemail', $email, PDO::PARAM_STR);

    $statement->execute();
}


?>