
var table = $('#tableProductos').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    }
});


function openModalEditVenta(nombre, precio, peso, categoria, stock, productId) {

    document.querySelector('#formCompra').reset();

    $('#modalVentas').modal('show');
    $("#nombre").val(nombre)
    $("#precio").val(precio)
    $("#peso").val(peso)
    $("#stock").val(stock)
    $("#productId").val(productId)
    $("#categoria").val(categoria)
}



$("#formCompra").on('submit', function (e) {

    e.preventDefault();

    var cantidad = $("#cantidad").val();
    var stock = $("#stock").val();
    var diferencia = stock - cantidad;


    if (diferencia < 0) {
        Swal.fire({
            title: 'Error!',
            html: "Tu compra excede el número de existencias disponibles!",
            icon: 'error'
        })
        $("#cantidad").val("");
    } else {
        $.ajax({
            type: 'POST',
            url: 'setVenta',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (objData) {

                if (objData.status) {
                    Swal.fire({
                        title: 'Correcto!',
                        html: objData.msg,
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        allowOutsideClick: false,

                    }).then((result) => {

                        if (result.isConfirmed) {
                            location.href = 'compra'
                        }
                    })

                } else {
                    Swal.fire({
                        title: 'Error!',
                        html: objData.msg,
                        icon: 'error'
                    })
                }

            }
        });
    }
});


