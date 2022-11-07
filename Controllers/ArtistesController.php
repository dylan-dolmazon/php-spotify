<?php

namespace App\Controllers;

use function MongoDB\BSON\toJSON;

class ArtistesController extends Controller
{

    public function index(){

        $name = "orelsan";

        if(!empty($_GET['name'])){
            $name = $_GET['name'];
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=$name&type=artist");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $artists = json_decode($result);
        curl_close($ch);

        $this->render('artistes/index',compact('artists'));
    }

    public function details($id) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $artist = json_decode($result);
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id/albums");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $albums = json_decode($result);
        curl_close($ch);

        $this->render('artistes/details',compact('artist','albums'));
    }
}