<div class="modal fade" id="modalVentas" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <form id="formCompra" name="formCompra">

                            <div class="card text-center">
                                <div class="card-header">
                                    Resumen de la compra
                                </div>
                                <div class="card-body">
                             
                                        <input type="hidden" name="productId" id="productId">
                                        <div class="row">
                                            <div class="col">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" readonly>
                                            </div>
                                            <div class="col">
                                                <label>Precio</label>
                                                <input type="text" class="form-control" id="precio" name="precio" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label>Stock Disponible</label>
                                                <input type="text" class="form-control" id="stock" name="stock" readonly>
                                            </div>
                                            <div class="col">
                                                <label>Cantidad a comprar</label>
                                                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                                            </div>
                                        </div>
                                 
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