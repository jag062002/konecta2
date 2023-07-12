<div class="container">
    <div class="card">
        <div class="card-header">
            Producto más vendido
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $nombreMax; ?></h5>
            <p class="card-text">Cantidad Total: <?= $cantidadMax; ?></p>
            <p class="card-text">Valor Total: <?= "$ " . number_format($totalMax, 0, "", "."); ?></p>
        </div>
    </div>