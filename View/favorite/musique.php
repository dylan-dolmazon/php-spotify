<?php

use App\Entity\Musique;


?>
    <div class="row">
<?php
foreach ($datas as $a) {
    $album = new Musique($a->name,$a->link,$a->idSpotify, $a->duration_ms);
    echo $album->displayFavorite();
}
?>
