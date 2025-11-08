// ==================== ESTADO USUARIO ====================
$(document).on('click', '.btnEstadoUsuario', function () {
  let id = $(this).attr('id');
  let estado = $(this).attr('estado');

  let nuevoEstado = estado == 1 ? 0 : 1;

  Swal.fire({
    title: 'Está seguro de cambiar el estado del usuario?',
    text: 'Si no lo está, puede cancelar la acción',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Confirmar',
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = `index.php?pagina=usuarios&id=${id}&estado=${nuevoEstado}`;
    }
  });
});

// ==================== ESTADO PLAN ====================
$(document).on('click', '.btnEstadoPlan', function () {
  let id_plan = $(this).attr('id_plan');
  let estado = $(this).attr('estado');

  let nuevoEstado = estado == 1 ? 0 : 1;

  Swal.fire({
    title: 'Está seguro de cambiar el estado del plan??',
    text: 'Si no lo está, puede cancelar la acción',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Confirmar',
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = `index.php?pagina=planes&id_plan=${id_plan}&estado=${nuevoEstado}`;
    }
  });
});

// ==================== ESTADO ENTRENADOR ====================
$(document).on('click', '.btnEstadoEntrenador', function () {
  let id = $(this).attr('id');
  let estado = $(this).attr('estado');

  let nuevoEstado = estado == 1 ? 0 : 1;

  Swal.fire({
    title: 'Está seguro de cambiar el estado del entrenador?',
    text: 'Si no lo está, puede cancelar la acción',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Confirmar',
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = `index.php?pagina=entrenadores&id=${id}&estado=${nuevoEstado}`;
    }
  });
});

// ==================== ESTADO PAGO ====================
$(document).on('click', '.btnEstadoPago', function () {
  let id = $(this).attr('id');
  let estado = $(this).attr('estado');

  let nuevoEstado = estado == 1 ? 0 : 1;

  Swal.fire({
    title: 'Está seguro de cambiar el estado del pago?',
    text: 'Si no lo está, puede cancelar la acción',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Cancelar',
    confirmButtonText: 'Confirmar',
  }).then(function (result) {
    if (result.isConfirmed) {
      window.location = `index.php?pagina=pagos&id=${id}&estado=${nuevoEstado}`;
    }
  });
});
