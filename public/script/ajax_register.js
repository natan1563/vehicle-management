$('#formRegister').submit((event) => {
  event.preventDefault();
  
  const owner_name = $('#owner_name').val();
  const color_id = parseInt($('#color_id').val());
  const model = $('#model').val();
  const plate = $('#plate').val();

  console.log(color_id);
  if (!color_id) {
    alert('Por favor selecione uma cor');
    return;
  }
   
  $.ajax({
    url: "/newRegister",
    type: 'POST',
    dataType: 'json',
    data: {
      owner_name,
      color_id,
      model,
      plate
    },
    statusCode: {
      201: function() {
        alert('Veículo registrado com sucesso!');
      },
      409: function() {
        alert('Falha ao registrar, tente novamente!');
      }
    }
  });
});