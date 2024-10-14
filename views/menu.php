<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 sticky-top">
    <div class="container-fluid">
        <!-- Botón de colapso a la izquierda -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Logo -->
        <a class="navbar-brand ml-3" href="/skinvault/index.php">SkinVault</a>

        <!-- Enlaces del menú -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link value" href="/skinvault/index.php?action=showChampions">Campeones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link value" href="/skinvault/index.php?action=misSkins">Mis Skins</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link value" href="/skinvault/views/login.php?action=logout">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CSS personalizado -->
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
    }

    /* Ícono del botón de colapso en blanco */
    .navbar-toggler-icon {
        filter: invert(1); /* Cambia el ícono a blanco */
    }

    /* Responsive: centrar el logo en dispositivos pequeños */
    @media (max-width: 767px) {
        .navbar-brand {
            margin-left: auto;
            margin-right: auto;
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
</style>
