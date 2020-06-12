<?php ?>

<h1>Weet U zeker dat u de planning van <?=$planning['rider']?> op <?=$planning["datetime"] ?> wilt verwijderen?</h1>

<a href="<?=URL?>planning/destroyPlanning/<?=$planning['id']?>">Ja</a> <a href="<?=URL?>home/index">Nee</a>
