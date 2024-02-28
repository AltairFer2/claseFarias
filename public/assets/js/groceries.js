$(document).ready(init);


function init() {
    $('#loadProductsBtn').click(function () {
        $.ajax({
            url: '/api/products',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                var products = data;
                var tableContent = "";
                $.each(products, function (index, product) {
                    tableContent += "<tr>";
                    tableContent += "<td>" + product.id + "</td>";
                    tableContent += "<td>" + product.name + "</td>";
                    tableContent += "<td>" + product.sale_price + "</td>";
                    tableContent += "<td>" + product.quantity + "</td>";
                    tableContent += "<td>" + product.description + "</td>";
                    tableContent += "<td>" + product.category.name + "</td>";
                    tableContent += "</tr>";
                });
                $("#tblProducts tbody").html(tableContent);
                let table = new DataTable('#tblProducts');
            },
            error: function () {
                alert("Error loading products.");
            }
        });
    });
}
