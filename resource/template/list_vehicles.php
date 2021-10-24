<div class="container">
<h1 class="text-center pb-3">Todos Veiculos</h1>
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
        <a href="/vehicle/edit/<?=$vehicle->id?>">
          <span class="material-icons px-1">
          mode
          </span>
        </a>

        <a href="/vehicle/delete/<?=$vehicle->id?>">
          <span class="material-icons px-1">
            delete_outline
          </span>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<button class="btn btn-sm btn-info px-3 py-1">Imprimir</button>
</div>