<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinVault</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <link rel="stylesheet" href="/skinvault/views/css/menu.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand ml-3" href="/skinvault/index.php">SkinVault</a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center">
                    <!-- Interruptor de modo oscuro -->
                    <li class="nav-item">
                        <label class="switch">
                            <input type="checkbox" id="darkModeToggle">
                            <span class="slider"></span>
                        </label>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link value" href="/skinvault/index.php?action=showChampions">Campeones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link value" href="/skinvault/index.php?action=misSkins">Mis Skins</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link value" href="/skinvault/index.php?action=nosotros">Nosotros</a> <!-- Nuevo enlace -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link value" href="/skinvault/views/login.php?action=logout">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const toggleSwitch = document.getElementById('darkModeToggle');

        // Función para aplicar el modo oscuro
        const applyDarkMode = (isDarkMode) => {
            if (isDarkMode) {
                document.body.classList.add('dark-mode');
                document.querySelector('.navbar').classList.add('dark-mode');
                localStorage.setItem('dark-mode', 'enabled');
            } else {
                document.body.classList.remove('dark-mode');
                document.querySelector('.navbar').classList.remove('dark-mode');
                localStorage.setItem('dark-mode', 'disabled');
            }
        };

        // Comprobar el estado del modo oscuro en el almacenamiento local
        if (localStorage.getItem('dark-mode') === 'enabled') {
            toggleSwitch.checked = true;
            applyDarkMode(true);
        }

        // Cambiar el estado del modo oscuro al alternar el interruptor
        toggleSwitch.addEventListener('change', () => {
            applyDarkMode(toggleSwitch.checked);
        });

        // Desplegar y cerrar el menú desde la izquierda
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.getElementById('navbarNav');

        navbarToggler.addEventListener('click', () => {
            navbarCollapse.classList.toggle('show');
        });

        // Cerrar el menú al hacer clic en cualquier enlace
        const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
