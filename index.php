<?php include 'partials/header.php'; ?>
<body>
    <?php include 'partials/navbar.php'; ?>

    <div class="container mt-5">
        <!-- Imagen Superior -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <img src="https://via.placeholder.com/1200x400" class="img-fluid" alt="Imagen destacada de remo">
            </div>
        </div>

        <!-- Sección de Noticias -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/348x232" class="card-img-top" alt="Noticia 1">
                    <div class="card-body">
                        <h5 class="card-title">Título Noticia 1</h5>
                        <p class="card-text">Breve descripción de la noticia 1. Algo interesante sobre las competiciones recientes o logros destacados.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/348x232" class="card-img-top" alt="Noticia 2">
                    <div class="card-body">
                        <h5 class="card-title">Título Noticia 2</h5>
                        <p class="card-text">Breve descripción de la noticia 2. Información sobre próximos eventos o cambios en las reglas del remo.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/348x232" class="card-img-top" alt="Noticia 3">
                    <div class="card-body">
                        <h5 class="card-title">Título Noticia 3</h5>
                        <p class="card-text">Breve descripción de la noticia 3. Historias inspiradoras de atletas o equipos en el remo.</p>
                        <a href="#" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
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
