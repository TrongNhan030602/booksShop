
//Hàm Thêm row mới trong form hóa đơn
function addProductRow() {
    var table = document.getElementById("productDetailsTable").getElementsByTagName('tbody')[0];
    var newRow = table.insertRow(table.rows.length);

    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);
    var cell5 = newRow.insertCell(4);
    var cell6 = newRow.insertCell(5);

    cell1.innerHTML = table.rows.length;
    cell2.innerHTML = '<input type="text" class="form-control" placeholder="Tên Sản Phẩm">';
    cell3.innerHTML = '<input type="text" class="form-control" placeholder="Số Lượng">';
    cell4.innerHTML = '<input type="text" class="form-control" placeholder="Giá Tiền">';
    cell5.innerHTML = '<input type="text" class="form-control" placeholder="Thành Tiền" readonly>';
    cell6.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeProductRow(this)">Xóa</button>';
}

// JavaScript function to remove a row from the product details table
function removeProductRow(btn) {
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
}