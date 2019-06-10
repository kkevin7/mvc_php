<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/style.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/materialize/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav>
    <div class="nav-wrapper grey darken-3">
        <a href="<?php echo constant('URL'); ?>" class="brand-logo">MVC_PHP</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo constant('URL'); ?>main">Home</a></li>
            <li><a href="<?php echo constant('URL'); ?>alumno">Alumnos</a></li>
            <li><a href="<?php echo constant('URL'); ?>alumnorest/findall">Alumno REST</a></li>
            <li><a href="<?php echo constant('URL'); ?>alumnoajax">Alumno AJAX</a></li>
        </ul>
    </div>
</nav>

<script src="https://kit.fontawesome.com/866cfd1594.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
