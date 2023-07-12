
var table = $('#tableCompras').DataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
    }
});

function openModal() {

    document.querySelector('#formProducto').reset();
    $('#modalProductos').modal('show');
}
function openModalEdit(nombre,precio,peso,categoria,stock,productId) {

    document.querySelector('#formProducto').reset();
    
    $('#modalProductos').modal('show');
    $("#nombre").val(nombre)
    $("#precio").val(precio)
    $("#peso").val(peso)
    $("#stock").val(stock)
    $("#productId").val(productId)
    $("#categoria").val(categoria)
}

function format(input) {
    var num = input.value.replace(/\./g, '');
    if (!isNaN(num)) {
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/, '');
        input.value = num;
    }

    else {
        alert('Solo se permiten numeros');
        input.value = input.value.replace(/[^\d\.]*/g, '');
    }
}

$("#formProducto").on('submit', function (e) {

    e.preventDefault();

    if ($("#nombre").val() == '' || $("#precio").val() == '' || $("#peso").val() == '' || $("#categoria").val() == ''
        || $("#stock").val() == '') {
        Swal.fire({
            icon: 'error',
            text: 'Hay campos vacíos en el formulario!'
        })
    } else {

        $.ajax({
            type: 'POST',
            url: 'setProducto',
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
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                           location.href = 'productos'
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


function fntBtnEliminar(param){
    var productId = param.getAttribute('productId');

    Swal.fire({
        title: 'Seguro que quieres eliminar el producto?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: 'eliminarProducto?productId='+productId,  
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
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                               location.href = 'productos'
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
      })
}