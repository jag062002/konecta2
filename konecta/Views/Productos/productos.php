<div class="container">
    <h3>Productos</h3>
    <button class="btn btn-info mb-4" onclick="openModal();">Nuevo Producto</button>
    <table class="table table-striped table-bordered" style="width:100%;" id="tableProductos" >
        <thead>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Referencia</td>
                <td>Precio</td>
                <td>Peso</td>
                <td>Categoria</td>
                <td>Stock</td>
                <td>Fecha Creacion</td>
                <td>Editar Producto</td>
                <td>Eliminar Producto</td>
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
                    <td><?= $id; ?></td>
                    <td><?= $nombre; ?></td>
                    <td><?= $referencia; ?></td>
                    <td><?= "$ ".number_format($precio,0,"","."); ?></td>
                    <td><?= $peso; ?></td>
                    <td><?= $categoria; ?></td>
                    <td><?= $stock; ?></td>
                    <td><?= $fecha_creacion; ?></td>
                    <td><button class="btn btn-primary" onclick="openModalEdit('<?=$nombre;?>','<?=$precio;?>','<?=$peso;?>','<?=$idCategoria;?>','<?=$stock;?>','<?=$id;?>');">Editar</button></td>
                    <td><button class="btn btn-danger" productId= "<?=$id;?>" onclick="fntBtnEliminar(this)">Eliminar</button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php require_once('Templates/Modals/modalProductos.php'); ?>