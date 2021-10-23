<body>
<form action="" method="post" class="my-5 row col-md-6 mx-auto">
  <div class="form-group mt-3">
    <label for="owner_name">Nome do proprietário</label>
    <input type="text" name="owner_name" class="form-control" id="owner_name">
  </div>

  <div class="form-group mt-3">
    <label for="color">Cores</label>
    <select class="form-control" name="color" id="color">
      <?php foreach($colors as $color): ?>
        <option value="<?= $color->id ?>"><?= $color->name ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group mt-3">
    <label for="model">Modelo</label>
    <input type="text" name="model" class="form-control" id="model">
  </div>

  <div class="form-group mt-3">
    <label for="plate">Placa</label>
    <input type="text" name="plate" class="form-control" id="plate">
    <button class="btn btn-primary btn-md w-25 mt-3">Cadastrar</button>
  </div>
</form>
</body>