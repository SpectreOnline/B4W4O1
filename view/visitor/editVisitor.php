<div class="col-10 mx-auto">
<h1>Je past nu <?=$visitor['name']?> aan</h1>

<form action="<?= URL ?>visitor/updateVisitor" method="post">
<input type="hidden" name="id" value="<?=$visitor["id"] ?>"/>
<div class="form-group">
  <label for="">Wijzig hier de naam</label>
  <input type ="text" class="form-control" name="name" id="" required><?=$visitor['name']?></input>
</div>
<div class="form-group">
  <label for="">Wijzig hier het adres</label>
  <input type ="text" class="form-control" name="adres" id="" required><?=$visitor['adres']?></input>
</div>

<div class="form-group">
  <label for="">Wijzig hier het telefoonnummer aan</label>
  <input type ="number" class="form-control" name="telephonenumber" id="" required min="10" max="15" ><?=$visitor['telephonenumber']?></input>
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>