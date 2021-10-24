<div class="container">
<h1 class="text-center pb-4">Todos Veículos</h1>
<table class="table border">
  <thead>
    <tr class="text-center">
      <th scope="col">Código</th>
      <th scope="col">Proprietário</th>
      <th scope="col">Cor</th>
      <th scope="col">Modelo</th>
      <th scope="col">Placa</th>
      <th scope="col">Data do cadastro</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($vehicles as $vehicle): ?>
    <tr class="text-center">
      <th><?=$vehicle->id;?></th>
      <td><?=$vehicle->owner_name;?></td>
      <td><?=$vehicle->color_name;?></td>
      <td><?=$vehicle->model;?></td>
      <td><?=$vehicle->plate;?></td>
      <td><?=date('d/m/Y', strtotime($vehicle->inserted_at));?></td>
      <td>
        <a href="/vehicle/edit?vehicle_id=<?=$vehicle->id?>">
          <span class="material-icons px-1">mode</span>
        </a>
        <a href="/remove" class="action_delete">
          <input type="hidden" name="vehicle_id" class="vehicle_id" value="<?=$vehicle->id?>">
          <span class="material-icons px-1"> delete_outline</span>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="javascript:window.print()" class="btn btn-sm mt-3 btn-info px-3 py-2">Imprimir</a>
</div>
<script src="../script/ajax_delete.js"></script>
