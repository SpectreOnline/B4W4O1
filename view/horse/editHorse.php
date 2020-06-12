<div class="col-10 mx-auto">
<h1>Je past nu <?=$horse['name']?> aan</h1>

<form action="<?= URL ?>horse/updateHorse" method="post">
<input type="hidden" name="id" value="<?=$horse["id"] ?>"/>
<div class="form-group">
  <label for="">Wijzig hier de naam</label>
  <input type ="text" class="form-control" name="name" id="" required><?=$horse['name']?></input>
</div>
<div class="form-group">
  <label for="">Wijzig hier het ras</label>
  <input type ="text" class="form-control" name="race" id="" required><?=$horse['race']?></input>
</div>

<div class="form-group">
  <label for="">Wijzig hier de hoogte in cm</label>
  <input type ="number" class="form-control" name="height" id="" required><?=$horse['height']?></input>
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>