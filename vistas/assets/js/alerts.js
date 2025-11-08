/*=============================================
FUNCIÓN SWEETALERT
=============================================*/
function fncSweetAlert(type, text, url) {
  switch (type) {
    /*=============================================
   ERROR
   =============================================*/
    case 'error':
      if (url == null) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: text,
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: text,
        }).then((result) => {
          if (result.value) {
            window.open(url, '_top');
          }
        });
      }

      break;
    /*=============================================
   CORRECTO
   =============================================*/
    case 'success':
      if (url == null) {
        Swal.fire({
          icon: 'success',
          title: 'OK',
          text: text,
        });
      } else {
        Swal.fire({
          icon: 'success',
          title: 'OK',
          text: text,
        }).then((result) => {
          if (result.value) {
            window.open(url, '_top');
          }
        });
      }
      break;

    /*=============================================
   CARGANDO
   =============================================*/
    case 'loading':
      Swal.fire({
        allowOutsideClick: false,
        icon: 'info',
        text: text,
      });
      Swal.showLoading();
      break;

    /*=============================================
   ALERTA SUAVE
   =============================================*/
    case 'close':
      Swal.close();
      break;

    /*=============================================
   CONFIRMACIÓN
   =============================================*/
    case 'confirm':
      return new Promise((resolve) => {
        Swal.fire({
          text: text,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Confirmar',
        }).then(function (result) {
          resolve(result.value);
        });
      });
      break;
  }
}
