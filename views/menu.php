<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkinVault</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="images/logo.png" type="image/png">
    <style>
        /* Estilos generales del menú */
        .navbar {
            background-color: #343a40; /* Fondo oscuro */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para dar profundidad */
        }

        /* Logo más grande */
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
            color: #fff; /* Color del texto del logo */
        }

        /* Enlaces de navegación */
        .navbar-nav .nav-link {
            color: aliceblue; /* Color del texto en los enlaces */
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 4px; /* Bordes redondeados */
            transition: all 0.2s ease;
            position: relative;
            gap: 5px; /* Espacio entre texto e ícono */
        }

        /* Efecto hover en los enlaces */
        .navbar-nav .nav-link:hover {
            background-color: #21262cad; /* Fondo en hover */
            color: #ffffff; /* Texto blanco en hover */
        }

        /* Enlace activo */
        .navbar-nav .nav-link.active {
            background-color: #007bff; /* Color azul para el enlace activo */
            color: white;
        }

        /* Botón de colapso a la izquierda */
        .navbar-toggler {
            margin-right: auto; /* Mueve el botón a la izquierda */
            z-index: 1060; /* Asegura que el botón esté por encima del menú */
        }

        /* Ícono del botón de colapso en blanco */
        .navbar-toggler-icon {
            filter: invert(1); /* Cambia el ícono a blanco */
        }

        /* Menú de hamburguesa desde la izquierda para pantallas pequeñas */
        @media (max-width: 767px) {
            .collapse {
                position: fixed;
                top: 0;
                left: -300px; /* Comienza fuera de la pantalla a la izquierda */
                width: 300px;
                height: 100%;
                background-color: #343a40; /* Color de fondo del menú desplegable */
                transition: left 0.3s ease; /* Transición suave al desplegar */
                z-index: 1050; /* Asegura que el menú esté por encima de otros elementos */
            }

            .collapse.show {
                left: 0; /* Se despliega a la izquierda */
            }

            .navbar-brand {
                margin-left: auto;
                margin-right: auto;
            }

            .navbar-nav {
                flex-direction: column; /* Cambia la dirección de la lista a columna en móvil */
                padding-top: 20px; /* Espaciado superior */
            }

            .nav-link {
                margin: 10px 0; /* Espaciado entre los enlaces */
            }
        }

        /* Estilos generales para pantallas grandes */
        @media (min-width: 768px) {
            .collapse {
                position: static;
                width: auto;
                height: auto;
                background-color: transparent;
                transition: none;
            }
        }

        /* Estilos específicos de los botones */
        .value {
            background-color: transparent; /* Fondo transparente */
            border: none; /* Sin borde */
            cursor: pointer; /* Cambia el cursor */
            transition: background-color 0.2s ease; /* Transición suave */
        }

        .value:focus,
        .value:active {
            background-color: #1a1f24; /* Fondo más oscuro al enfocar */
            outline: none; /* Sin contorno */
        }

        .value svg {
            width: 15px; /* Tamaño del ícono */
        }

        /* Estilos para el interruptor de modo oscuro */
        .switch {
            display: block;
            --width-of-switch: 3.5em;
            --height-of-switch: 2em;
            --size-of-icon: 1.4em;
            --slider-offset: 0.3em;
            position: relative;
            width: var(--width-of-switch);
            height: var(--height-of-switch);
            margin: 0 auto; /* Centrar el interruptor */
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f4f4f5;
            transition: .4s;
            border-radius: 30px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: var(--size-of-icon, 1.4em);
            width: var(--size-of-icon, 1.4em);
            border-radius: 20px;
            left: var(--slider-offset, 0.3em);
            top: 50%;
            transform: translateY(-50%);
            background: linear-gradient(40deg, #ff0080, #ff8c00 70%);
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #303136;
        }

        input:checked + .slider:before {
            left: calc(100% - (var(--size-of-icon, 1.4em) + var(--slider-offset, 0.3em)));
            background: #303136;
            box-shadow: inset -3px -2px 5px -2px #8983f7, inset -10px -4px 0 0 #a3dafb;
        }

        /* Estilos para el modo oscuro */
        body.dark-mode {
            background-color: #2c2c2c;
            color: #ffffff;
        }

        /* Estilos adicionales para el modo oscuro */
        .navbar.dark-mode {
            background-color: #1e1e1e;
        }
    </style>
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
