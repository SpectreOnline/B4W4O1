<?php 
$plannings = getAllPlannings();
?>

<h1>Hier zijn al onze geregistreerde bezoekers!</h1>

<?php foreach($plannings as $row ) {?>
<div class="card col-10 mx-auto">
    <img class="card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body">
        <h4 class="card-title"><?=$row['datetime']?></h4>
        <p class="card-text">Ruiter: <?=$row['rider']?></p>
        <p class="card-text">duurt: <?=$row['duration']?> Uur </p>
        <p class="card-text">paard: <?=$row['horse']?> </p>
        <a href="<?=URL?>planning/editPlanning/<?=$row['id']?>"><button class="btn btn-warning"> Pas <?=$row['name']?> aan</button></a>
        <a href="<?=URL?>planning/deletePlanning/<?=$row['id']?>"><button class="btn btn-danger"> verwijder <?=$row['name']?></button></a>
    </div>
</div>
<?php }?>