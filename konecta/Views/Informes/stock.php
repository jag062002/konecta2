<div class="container">
    <h3>Informe de Stock</h3>

    <div class="card mb-4" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Producto con mayor stock</h5>
            <p class="card-text"> <?= $nombreMax; ?></p>
            <p class="card-text">Referencia: <?= $referenciaMax; ?></p>
            <p class="card-text">Valor: <?= $stockMax; ?></p>
        </div>
    </div>

    <table class="table table-striped table-bordered" style="width:100%;" id="tableProductos">
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Referencia</td>
                <td>Stock</td>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($result); $i++) {

                $id = $result[$i]['id'];
                $nombre = $result[$i]['nombre'];
                $referencia = $result[$i]['referencia'];
                $stock = $result[$i]['stock'];

            ?>
                <tr>
                    <td><?= $id; ?></td>
                    <td><?= $nombre; ?></td>
                    <td><?= $referencia; ?></td>
                    <td><?= $stock; ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once('Templates/Modals/modalProductos.php'); ?>