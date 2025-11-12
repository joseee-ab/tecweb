var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function(){
    let edit = false;

    let JsonString = JSON.stringify(baseJSON,null,2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                const productos = JSON.parse(response);
            
                if(Object.keys(productos).length > 0) {
                    let template = '';

                    productos.forEach(producto => {
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#products').html(template);
                }
            }
        });
    }

    $('#nombre').keyup(function() {
        const nombre = $(this).val().trim();
        
        // Solo validar si hay texto y NO estamos en modo edición
        if(nombre != '' && !edit) {
            $.ajax({
                url: './backend/product-search.php?search=' + nombre,
                type: 'GET',
                success: function(response) {
                    const data = JSON.parse(response);
                    
                    // Verificar si existe algún producto con ese nombre exacto
                    const productoExiste = data.some(producto => 
                        producto.nombre.toLowerCase() === nombre.toLowerCase()
                    );
                    
                    if(productoExiste) {
                        let html = '<li style="color: red; list-style:none;"> El producto ya existe en la BD</li>';
                        $("#product-result").show();
                        $("#container").html(html);
                    } else {
                        $("#container").html("");
                        $("#product-result").hide();
                    }
                }
            });
        } else {
            $("#container").html("");
            $("#product-result").hide();
        }
    });

    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        const productos = JSON.parse(response);
                        
                        if(Object.keys(productos).length > 0) {
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                            
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;

                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            $('#product-result').show();
                            $('#container').html(template_bar);
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });

    $('#product-form').submit(e => {
        e.preventDefault();

        // Obtenemos todos los datos actualizados del formulario
        const postData = {
            id: $('#productId').val(),
            nombre: $('input[name="nombre"]').val().trim(),
            marca: $('input[name="marca"]').val().trim(),
            modelo: $('input[name="modelo"]').val().trim(),
            precio: parseFloat($('input[name="precio"]').val()),
            detalles: $('textarea[name="detalles"]').val().trim(),
            unidades: parseInt($('input[name="unidades"]').val(), 10),
            imagen: $('input[name="imagen"]').val().trim() || 'img/default.png'
        };

        // Elegimos si es agregar o editar
        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';

        // Enviamos al backend
        $.post(url, postData, (response) => {
            console.log("Respuesta del servidor:", response);

            try {
                const respuesta = JSON.parse(response);

                // Mostramos feedback al usuario
                $('#product-result').show();
                $('#container').html(`
                    <li style="list-style:none;">status: ${respuesta.status}</li>
                    <li style="list-style:none;">message: ${respuesta.message}</li>
                `);
            } catch {
                alert('Error en respuesta del servidor');
            }

            // Limpiar formulario y refrescar tabla
            formularioReset();
            listarProductos();
            edit = false;
        });
    });

    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                $('#product-result').hide();
                listarProductos();
            });
        }
    });

    $(document).on('click', '.product-item', function (e) {
        e.preventDefault();

        const element = $(this).closest('tr');
        const id = element.attr('productId');

        // Petición AJAX al backend
        $.post('./backend/product-single.php', { id }, (response) => {
            const product = JSON.parse(response);

            // Rellenar los campos del formulario
            $('input[name="nombre"]').val(product.nombre);
            $('input[name="marca"]').val(product.marca);
            $('input[name="modelo"]').val(product.modelo);
            $('input[name="precio"]').val(product.precio);
            $('textarea[name="detalles"]').val(product.detalles);
            $('input[name="unidades"]').val(product.unidades);
            $('input[name="imagen"]').val(product.imagen);
            $('#productId').val(product.id);

            // Activar modo edición
            edit = true;
            
            // Limpiar mensaje de validación del nombre duplicado
            $("#container").html("");
            $("#product-result").hide();
            
            // Limpiar TODOS los mensajes de error de validaciones.js
            document.querySelectorAll('.error').forEach(error => {
                error.textContent = '';
            });
        });
    });
    
});

function formularioReset() {
    $('#product-form')[0].reset();
    $('#productId').val('');

    $("#container").html("");
    $("#product-result").hide();
    
    document.querySelectorAll('.error').forEach(error => {
        error.textContent = '';
    });
}