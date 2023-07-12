<div class="container">
    <h3>Proceso de compra</h3>
    <table class="table table-striped table-bordered" style="width:100%;" id="tableCompras">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Referencia</td>
                <td>Precio</td>
                <td>Categoria</td>
                <td>Stock</td>
                <td>Comprar Producto</td>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($result); $i++) {

                $id = $result[$i]['id'];
                $idCategoria = $result[$i]['idCategoria'];
                $nombre = $result[$i]['nombre'];
                $referencia = $result[$i]['referencia'];
                $precio = $result[$i]['precio'];
                $peso = $result[$i]['peso'];
                $categoria = $result[$i]['categoria'];
                $stock = $result[$i]['stock'];
                $fecha_creacion = $result[$i]['fecha_creacion'];
            ?>
                <tr>
                    <td><?= $nombre; ?></td>
                    <td><?= $referencia; ?></td>
                    <td><?= "$ " . number_format($precio, 0, "", "."); ?></td>
                    <td><?= $categoria; ?></td>
                    <td><?= $stock; ?></td>
                    <td>
                        <?php if($stock == 0) { ?>
                            <button class="btn btn-danger">Sin Stock</button>
                        <?php }else{ ?>
                            <button class="btn btn-success" onclick="openModalEditVenta('<?= $nombre; ?>','<?= $precio; ?>','<?= $peso; ?>','<?= $idCategoria; ?>','<?= $stock; ?>','<?= $id; ?>');">Comprar</button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once('Templates/Modals/modalVentas.php'); ?>