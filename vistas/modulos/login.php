<body class="bg-color">
    <!-- Begin page -->
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 col-lg-3">
            <div class="text-center mb-4">
                <h3 class="text-dark fs-30 fw-medium mb-2">Inicio del sistema</h3>
                <p class="text-dark fs-14 mb-0">Ingrese sus datos</p>
            </div>

            <form method="POST" class="my-4">
                <div class="form-group mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input class="form-control" type="text" id="usuario" name="usuario" required
                        placeholder="Ingrese su usuario">
                </div>

                <div class="form-group mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input class="form-control" type="password" id="contrasena" name="contrasena"
                        placeholder="Ingrese su contraseña">
                </div>

                <div class="form-group mb-0">
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Ingresar</button>
                    </div>
                </div>

                <?php
                $ingreso = new ControladorUsuarios();
                $ingreso->ctrIngresoUsuarios();
                ?>
            </form>
        </div>
    </div>
</body>