<?php

namespace App\Controllers;
use App\Entity\Artist;

class FavoriteController extends Controller
{
    public function index(){
        $temp = new Artist('','',0,'','','');
        $datas = $temp->findAll();

        $this->render('favorite/index',compact('datas'));
    }

    public function delFavorite($id){
        $temp = new Artist('','',0,'','','');
        $temp->delete($id);

        header('location: /favorite/index');
    }
}