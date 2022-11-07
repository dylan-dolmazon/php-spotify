<form action="/artistes/index/" method="get" class="mb-4">
    <label for="name">Artist</label>
    <input type="text" name="name" id="name">
    <button type="submit">Submit</button>
</form>

<?php
use App\Entity\Artist;
?>
<div class="row">
<?php
foreach ($artists->artists->items as $a) {
    $defaultImage = "https://www.oiseaux.net/photos/vincent.palomares/images/pigeon.biset.vipa.1g.jpg";
    if(!empty($a->images[0])){
        $defaultImage = $a->images[0]->url;

    }
    $idSpotify = $a->id;
    $artist = new Artist($idSpotify,$a->name,$a->followers->total,$a->external_urls->spotify,$defaultImage,$a->genres);
    echo $artist->display();
}
?>
</div>
