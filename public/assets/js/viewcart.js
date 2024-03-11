function decreaseQuantity(button) {
    var input = button.nextElementSibling;
    var currentValue = parseInt(input.value);

    if (currentValue > 1) {
        input.value = currentValue - 1;
        updateCartItem(input);
    }
}

function increaseQuantity(button) {
    var input = button.previousElementSibling;
    var currentValue = parseInt(input.value);

    input.value = currentValue + 1;
    updateCartItem(input);
}

function updateCartItem(input) {
    var row = input.closest('.cart__table-thead-tr');
    var price = parseFloat(row.querySelector('.cart__table-price span').innerText.replace('đ', '').replace('.', '')
        .replace(',', '.'));
    var quantity = parseInt(input.value);

    var subtotal = price * quantity;

    // Format the subtotal with the desired currency format
    var formattedSubtotal = formatCurrency(subtotal);

    // Update the subtotal in the table
    row.querySelector('.cart__table-subtotal span').innerText = formattedSubtotal;

    // Update the total sum
    updateTotalSum();
}

function updateTotalSum() {
    var totalSum = 0;

    // Get all subtotals and sum them up
    var subtotals = document.querySelectorAll('.cart__table-subtotal span');
    subtotals.forEach(function(subtotal) {
        totalSum += parseFloat(subtotal.innerText.replace('đ', '').replace('.', '').replace(',', '.'));
    });

    // Format the total sum with the desired currency format
    var formattedTotalSum = formatCurrency(totalSum);

    // Update the total sum in the footer
    document.querySelector('.cart__footer-sum-value h4').innerText = formattedTotalSum;
}

// Function to format currency
function formatCurrency(amount) {
    return amount.toLocaleString('vi-VN', {
        style: 'currency',
        currency: 'VND'
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Get all quantity input elements
    var quantityInputs = document.querySelectorAll('.quantity');

    // Attach event listeners to each quantity input
    quantityInputs.forEach(function(input) {
        input.addEventListener('change', function() {
            updateCartItem(input);
        });
    });

    // Update the total sum when the page loads
    updateTotalSum();
});
// Thêm event listener cho tất cả các trường input số lượng
quantityInputs.forEach(function(input) {
    input.addEventListener('change', function() {
        updateCartItem(input);
    });
});
