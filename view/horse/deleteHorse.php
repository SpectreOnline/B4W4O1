<?php ?>

<h1>Weet U zeker dat u <?=$horse['name']?> wilt verwijderen?</h1>

<a href="<?=URL?>horse/destroyHorse/<?=$horse['id']?>">Ja</a> <a href="<?=URL?>home/index">Nee</a>