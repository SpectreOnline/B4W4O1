<?php
$visitors = getAllVisitors();
$horses = getAllHorses();
?>
<div class="col-10 mx-auto">
<h1>Pas hier de benodigde informatie aan</h1>

<form action="<?=URL?>planning/updatePlanning" method="post" >

<div class="form-group">
  <label for="">Pas hier de start van de rit aan</label>
  <input type ="datetime-local" class="form-control" name="datetime" id="" required><?=$planning["datetime"]?></input>
</div>

<div class="form-group">
  <label for="">Pas hier de duur van de rit in uren aan</label>
  <input type ="number" class="form-control" name="duration" id="" required><?=$planning["duration"]?></input>
</div>

<div class="form-group">
  <label for="">Pas hier de ruiter aan</label>
  <select class="form-control" name="rider" id="">
  <?php
    foreach($visitors as $row){
    ?>
    <option value="<?=$row["name"]?>"><?=$row["name"]?></option>
    <?php } ?>
  </select>
  <?=$planning["rider"]?>
</div>

<div class="form-group">
  <label for="">Pas hier het paard aan</label>
  <select class="form-control" name="horse" id="">
  <?php
    foreach($horses as $row){
    ?>
    <option value="<?=$row["name"]?>"><?=$row["name"]?></option>
    <?php } ?>
  </select>
  <?=$planning["horse"]?>
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>