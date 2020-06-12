<?php ?>

<h1>Weet U zeker dat u <?=$visitor['name']?> wilt verwijderen?</h1>

<a href="<?=URL?>visitor/destroyVisitor/<?=$visitor['id']?>">Ja</a> <a href="<?=URL?>home/index">Nee</a>