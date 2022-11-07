<?php

namespace App\Controllers;

use function MongoDB\BSON\toJSON;

class ArtistesController extends Controller
{

    public function index(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=orelsan&type=artist");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $artists = json_decode($result);
        curl_close($ch);

        $this->render('artistes/index',compact('artists'));
    }

}