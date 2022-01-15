<?php

require_once "../models/databaseModel/databeseConnect.php";



function  generujJson($typ)
{
    global $conn;
    $polenehnutelnosti = array();
    $posts = array();


    $sql = 'CALL getGallery(:utyp)';

    $statement = $conn->prepare($sql);

    $statement->bindParam(':utyp', $typ, PDO::PARAM_INT);

    $statement->execute();


    $idItem =0;


    while ($row = $statement->fetch()) {

        $itm = $row["location"];

        $posts[] = array('id' => $idItem,'name' =>  $row["nazov"] ,'description' => $row["popis"]  ,'source' => $itm);

        $idItem  = $idItem + 1;

    }

    if($idItem == 0 )
    {
        $posts[] = array('id' => $idItem,'name' =>  "Galeria neexistuje" ,'description' => "" ,'source' => "../../views/images/404.png");
    }

    $polenehnutelnosti = $posts;
    $fp = fopen('../views/galleryViews/json/photos.json', 'w');
    fwrite($fp, json_encode($polenehnutelnosti ,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    fclose($fp);

}


?>