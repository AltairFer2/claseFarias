$(document).ready(function () {
    loadCategories();
    init();

    $('#categoryFilter').change(function () {
        var selectedCategory = $(this).val();
        updateDataTable(selectedCategory);
    });
});


function init() {
    $('#loadProductsBtn').click(function () {
        var selectedCategory = $('#categoryFilter').val();
        $.ajax({
            url: '/api/products' + (selectedCategory ? '?category=' + selectedCategory : ''),
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var products = data;
                var tableContent = "";
                $.each(products, function (index, product) {
                    tableContent += "<tr>";
                    tableContent += "<td>" + product.id + "</td>";
                    tableContent += "<td>" + product.name + "</td>";
                    tableContent += "<td>" + product.price + "</td>";
                    tableContent += "<td>" + product.quantity + "</td>";
                    tableContent += "<td>" + product.description + "</td>";
                    tableContent += "<td>" + product.category + "</td>"; // Asegúrate de que 'category' sea el campo correcto
                    tableContent += "</tr>";
                });
                $("#tblProducts tbody").html(tableContent);
            },
            error: function () {
                alert("Error loading products.");
            }
        });
    });

    window.tblProductsDt = $('#tblProductsDt').DataTable({
        ajax: '/api/products_dt', // URL inicial sin filtro de categoría
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'sale_price' },
            { data: 'quantity' },
            { data: 'description' },
            { data: 'category.name' },
        ],
        columnDefs: [
            {
                targets: 4,
                data: 'description',
                render: function (data, type, row, meta) {
                    return type === 'display' && data.length > 40 ? '<span title="' + data + '">' + data.substr(0, 20) + '...</span>' : data;
                }
            }
        ]
    });
}

// Función para cargar las categorías en el combobox
function loadCategories() {
    $.ajax({
        url: '/api/categories',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var categories = data;
            var options = "<option value=''>Select Category</option>";
            $.each(categories, function (index, category) {
                options += "<option value='" + category.id + "'>" + category.name + "</option>";
            });
            $('#categoryFilter').html(options);

            $('#categoryFilter').select2({
                placeholder: "Select a category",
                allowClear: true
            });
        },
        error: function () {
            alert("Error loading categories.");
        }
    });
}


function updateDataTable(selectedCategory) {
    var ajaxUrl = '/api/products_dt' + (selectedCategory ? '?category_id=' + selectedCategory : '');
    tblProductsDt.ajax.url(ajaxUrl).load();
}
