<div class="container">
  <h1 class="text-center text-secondary pb-3">Edite seu Veículo</h1>
  <form class="row col-md-6 mx-auto" id="formEdit">
    <div class="form-group mt-3">
      <label for="owner_name">Nome do proprietário</label>
      <input type="text" name="owner_name" class="form-control" id="owner_name" value="<?=$vehicle->owner_name?>" maxlenght="100" required>
      <input type="hidden" name="id" id="id" value="<?=$vehicle->id?>">
    </div>

    <div class="form-group mt-3">
      <label for="color_id">Cores</label>
      <select class="form-control" name="color_id" id="color_id" required>
        <?php foreach($colors as $color): ?>
          <option 
          <?= ($color->id == $vehicle->color_id) ? 'selected' : ''; ?> 
          value="<?= $color->id ?>">
            <?= $color->name ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="form-group mt-3">
      <label for="model">Modelo</label>
      <input type="text" name="model" class="form-control" id="model" value="<?=$vehicle->model?>" maxlenght="100" required>
    </div>

    <div class="form-group mt-3">
      <label for="plate">Placa</label>
      <input type="text" name="plate" class="form-control" id="plate" value="<?=$vehicle->plate?>" maxlength="7" required>
      <button class="btn btn-primary btn-md w-25 mt-3">Editar</button>
    </div>
  </form>
</div>

<script src="../script/ajax_edition.js"></script>
