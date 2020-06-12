<?php
$visitors = getAllVisitors();
$horses = getAllHorses();
?>
<div class="col-10 mx-auto">
<h1>Voer hier de benodigde informatie in</h1>

<form action="store" method="post" >

<div class="form-group">
  <label for="">voer hier de start van de rit in</label>
  <input type ="datetime-local" class="form-control" name="datetime" id="" required></input>
</div>

<div class="form-group">
  <label for="">voer hier de duur van de rit in uren in</label>
  <input type ="number" class="form-control" name="duration" id="" required></input>
</div>

<div class="form-group">
  <label for="">Voer hier de ruiter in</label>
  <select class="form-control" name="rider" id="">
  <?php
    foreach($visitors as $row){
    ?>
    <option value="<?=$row["name"]?>"><?=$row["name"]?></option>
    <?php } ?>
  </select>
</div>

<div class="form-group">
  <label for="">Voer hier het paard in</label>
  <select class="form-control" name="horse" id="">
  <?php
    foreach($horses as $row){
    ?>
    <option value="<?=$row["name"]?>"><?=$row["name"]?></option>
    <?php } ?>
  </select>
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>