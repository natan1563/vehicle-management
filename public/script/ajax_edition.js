$('#formEdit').submit((event) => {
  event.preventDefault();
  
  const id = $('#id').val();
  const owner_name = $('#owner_name').val();
  const color_id = parseInt($('#color_id').val());
  const model = $('#model').val();
  const plate = $('#plate').val();

  if (!color_id) {
    alert('Por favor selecione uma cor');
    return;
  }
   
  $.ajax({
    url: "/editVehicle",
    type: 'POST',
    dataType: 'json',
    data: {
      id,
      owner_name,
      color_id,
      model,
      plate
    },
    statusCode: {
      204: function() {
        alert('Veículo atualizado com sucesso!');
      },
      409: function() {
        alert('Falha ao atualizar, tente novamente!');
      }
    }
  });
});