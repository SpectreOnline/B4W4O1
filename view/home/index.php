<?php 

$horses = getAllHorses();
?>
<div class="container">
 <h1>Welkom bij het php-framework.</h1>
 <p>Je bent nu in home/index.</p>
</div>

<?php foreach($horses as $row ) {?>
<div class="card col-10 mx-auto">
    <img class="card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body">
        <h4 class="card-title"><?=$row['name']?></h4>
        <p class="card-text">Ras: <?=$row['race']?></p>
        <p class="card-text">Hoogte: <?=$row['height']?> cm</p>
        <a href="<?=URL?>horse/editHorse/<?=$row['id']?>"><button class="btn btn-warning"> Pas <?=$row['name']?> aan</button></a>
        <a href="<?=URL?>horse/deleteHorse/<?=$row['id']?>"><button class="btn btn-danger"> verwijder <?=$row['name']?></button></a>
    </div>
</div>
<?php }?>