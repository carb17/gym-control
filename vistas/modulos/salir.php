<?php
session_start();
session_destroy();


echo '<script>
window.location = "' . ControladorPlantilla::url() . 'login"; 
</script>';

exit();