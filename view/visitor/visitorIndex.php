<?php 
$visitors = getAllVisitors();
?>

<h1>Hier zijn al onze geregistreerde bezoekers!</h1>

<?php foreach($visitors as $row ) {?>
<div class="card col-10 mx-auto">
    <img class="card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body">
        <h4 class="card-title"><?=$row['name']?></h4>
        <p class="card-text">Adres: <?=$row['adres']?></p>
        <p class="card-text">Tel.: <?=$row['phonenumber']?> </p>
        <a href="<?=URL?>visitor/editVisitor/<?=$row['id']?>"><button class="btn btn-warning"> Pas <?=$row['name']?> aan</button></a>
        <a href="<?=URL?>visitor/deleteVisitor/<?=$row['id']?>"><button class="btn btn-danger"> verwijder <?=$row['name']?></button></a>
    </div>
</div>
<?php }?>