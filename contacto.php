<?php include 'partials/header.php'; ?>
<body>
    <?php include 'partials/navbar.php'; ?>

    <div class="container mt-5">
        <h2>Contacto</h2>
        <p>Rellena el formulario para enviarnos un mensaje.</p>

        <!-- Formulario de Contacto -->
        <div class="row">
            <div class="col-lg-8">
                <form>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" placeholder="tuemail@ejemplo.com">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea class="form-control" id="mensaje" rows="3" placeholder="Escribe tu mensaje aquí"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
