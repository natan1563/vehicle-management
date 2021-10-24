$(".action_delete").click(function(event) {
  event.preventDefault();
  if (!confirm('Tem certeza que deseja excluir este registro?')){
    return;
  } 
  
  const id = $(this).find('.vehicle_id').val();

  $.ajax({
    url: '/remove',
    type: 'POST',
    dataType: 'json',
    data: {
      id
    },
    statusCode: {
      200: function() {
        alert('Veículo removido com sucesso!');
        window.location = '/';
      },
      409: function() {
        alert('Falha ao remover, tente novamente!');
      },
      404: function() {
        alert('Falha ao remover, tente novamente!');
      }
    }
  })
})