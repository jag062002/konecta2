<div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Nuevo producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form id="formProducto" name="formProducto">
                            <input type="hidden" name="productId" id="productId">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" placeholder="Nombre" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="precio">Precio</label>
                                    <input type="text" class="form-control" name="precio" id="precio" required autocomplete="off" placeholder="Precio" onchange="format(this)">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="peso">Peso</label>
                                    <input type="number" class="form-control" id="peso" name="peso" required autocomplete="off" placeholder="Peso">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="categoria">Categoria</label>
                                    <select name="categoria" id="categoria" required class="custom-select">
                                        <option value="">Selecciona una categoria</option>
                                        <?php for ($j = 0; $j < count($result2); $j++) { ?>
                                            <option value="<?=$result2[$j]['id'];?>"><?=$result2[$j]['nombre'];?></option>
                                        <?php } ?>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" required autocomplete="off" placeholder="Valor del Stock">
                                </div>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle" arial-hidden="true"></i> Guardar</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="app-menu__icon fas fa-sign-out-alt" arial-hidden="true"></i> Salir</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>