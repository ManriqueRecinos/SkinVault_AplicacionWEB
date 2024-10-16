<style>
    /* Estilos de la lista de iconos */
    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .example-2 {
        display: flex;
        flex-direction: column;
        position: fixed; /* Fija en la parte derecha */
        right: 20px; /* Espacio desde la derecha */
        top: 50%; /* Centrado verticalmente */
        transform: translateY(-50%); /* Ajuste para centrado */
    }

    .icon-content {
        margin: 10px 0; /* Espaciado entre iconos */
        position: relative;
        padding: 0.5rem;
    }

    .icon-content .tooltip {
        position: absolute;
        top: 100%;
        right: 110%;
        transform: translateY(200%);
        color: #ffffff;
        padding: 6px 10px;
        border-radius: 5px;
        opacity: 0;
        visibility: hidden;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .icon-content:hover .tooltip {
        opacity: 1;
        visibility: visible;
        top: -50px;
    }

    .icon-content a {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        color: #2c2c2c;
        background-color: #fff; /* Color de fondo normal */
        transition: all 0.3s ease-in-out;
    }

    .icon-content a:hover {
        box-shadow: 3px 2px 45px 0px rgb(0 0 0 / 12%);
        color: white;
    }

    .icon-content a svg {
        position: relative;
        z-index: 1;
        width: 30px;
        height: 30px;
    }

    .icon-content a .filled {
        position: absolute;
        top: auto;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 0;
        background-color: #000;
        transition: all 0.3s ease-in-out;
    }

    .icon-content a:hover .filled {
        height: 100%;
    }

    /* Estilos para cada red social */
    .icon-content a[data-social="tiktok"] .filled,
    .icon-content a[data-social="tiktok"] ~ .tooltip {
        background-color: #000000;
    }

    .icon-content a[data-social="github"] .filled,
    .icon-content a[data-social="github"] ~ .tooltip {
        background-color: #24262a;
    }

    .icon-content a[data-social="instagram"] .filled,
    .icon-content a[data-social="instagram"] ~ .tooltip {
        background: linear-gradient(45deg, #405de6, #5b51db, #b33ab4, #c135b4, #e1306c, #fd1f1f);
    }

    .icon-content a[data-social="youtube"] .filled,
    .icon-content a[data-social="youtube"] ~ .tooltip {
        background-color: #ff0000;
    }

    /* Estilos para modo oscuro */
    body.dark-mode .icon-content a {
        background-color: #2c2c2c; /* Cambiar fondo a negro en modo oscuro */
        color: #fff; /* Cambiar color de texto a blanco en modo oscuro */
    }

    /* Cambiar los colores en modo oscuro */
    body.dark-mode .icon-content a[data-social="tiktok"] .filled,
    body.dark-mode .icon-content a[data-social="tiktok"] ~ .tooltip {
        background-color: #000000;
    }

    body.dark-mode .icon-content a[data-social="github"] .filled,
    body.dark-mode .icon-content a[data-social="github"] ~ .tooltip {
        background-color: #24262a;
    }

    body.dark-mode .icon-content a[data-social="instagram"] .filled,
    body.dark-mode .icon-content a[data-social="instagram"] ~ .tooltip {
        background: linear-gradient(45deg, #405de6, #5b51db, #b33ab4, #c135b4, #e1306c, #fd1f1f);
    }

    body.dark-mode .icon-content a[data-social="youtube"] .filled,
    body.dark-mode .icon-content a[data-social="youtube"] ~ .tooltip {
        background-color: #ff0000;
    }

</style>

<div class="example-2">
    <ul>
        <li class="icon-content">
            <a href="https://tiktok.com/" aria-label="Tiktok" target="_blank" data-social="tiktok">
                <div class="filled"></div>
                <svg viewBox="0 0 19.738 22.466" height="22.466" width="19.738" xmlns="http://www.w3.org/2000/svg"fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                    <path fill="#" transform="translate(-31.423 -0.39)" d="M51.151,6.015a5.661,5.661,0,0,1-3.42-1.143A5.662,5.662,0,0,1,45.469.39H41.8V10.414l0,5.49a3.325,3.325,0,1,1-2.281-3.151V9.029a7.218,7.218,0,0,0-1.058-.078,7.034,7.034,0,0,0-5.286,2.364,6.893,6.893,0,0,0,.311,9.505,7.158,7.158,0,0,0,.663.579,7.035,7.035,0,0,0,4.312,1.458,7.219,7.219,0,0,0,1.058-.078,7.011,7.011,0,0,0,3.917-1.959,6.868,6.868,0,0,0,2.06-4.887l-.019-8.2a9.3,9.3,0,0,0,5.688,1.933V6.014h-.011Z" data-name="Path 6566" id="Path_6566"></path></svg>
            </a>
            <div class="tooltip">Tiktok</div>
        </li>
        <li class="icon-content">
            <a href="https://www.instagram.com/" aria-label="Instagram" data-social="instagram" target="_blank">
                <div class="filled"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16" xml:space="preserve"><path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" fill="currentColor"></path></svg>
            </a>
            <div class="tooltip">Instagram</div>
        </li>
        <li class="icon-content">
            <a href="https://www.github.com/ManriqueRecinos" aria-label="GitHub" target="_blank" data-social="github">
                <div class="filled"></div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.18 0 .85-.01 1.54-.01 1.75 0 .22.15.46.55.38C13.71 14.53 16 11.54 16 8c0-4.42-3.58-8-8-8z" />
                </svg>
            </a>
            <div class="tooltip">GitHub</div>
        </li>
    <li class="icon-content">
        <a href="https://youtube.com/" aria-label="Youtube" target="_blank" data-social="youtube">
            <div class="filled"></div>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16" xml:space="preserve"><path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z" fill="currentColor"></path></svg>
        </a>
    <div class="tooltip">Youtube</div>
  </li>
    </ul>
</div>
