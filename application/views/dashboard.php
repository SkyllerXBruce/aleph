<!-- Formulario del Dashboard -->
<!-- Agregamos el Encabezado -->
<?= $head ?>
<!-- Agregamos el Nav -->
<?= $nav ?>
<!-- Contenemos los Siguentes Componentes -->
<div class="container-fluid">
    <div class="row">
        <!-- Agregamos el Aside -->
        <?= $aside ?>
        <!-- Agregamos el Contenido del Dashboard -->
        <main class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <?= $content ?>
        </main>
    </div>
</div>
<!-- Agregamos el Footer -->
<?= $footer ?>
