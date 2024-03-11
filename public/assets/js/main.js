/* Base js*/
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

/* Header__mobile-selection */
const barBtn = $('.js-barBtn');
const headerSlWrap = $('.header__mobile-selection-wrap');
const mobileOverlay = $('.header__mobile-selection-overlay');
const closeBtn = $('.js-closeBtn');
const mobileSelecItems = $$('.header__mobile-selection-item');


barBtn.onclick = function() {
    headerSlWrap.classList.add('open');
    mobileOverlay.classList.add('open');
}

function removeOpen() {
    mobileOverlay.classList.remove('open');
    headerSlWrap.classList.remove('open');
}
mobileOverlay.onclick = removeOpen;

closeBtn.onclick = removeOpen;

for (var i = 0; i < mobileSelecItems.length; i++) {
    var mobileSelecItem = mobileSelecItems[i];
    mobileSelecItem.onclick = function(event) {
        removeOpen();
    }
}





/* Regis form */
$(".auth-form-register").addEventListener("submit", function(event) {
    event.preventDefault();


    var password = $(".password").value;
    var confirmPassword = $(".confirm-password").value;
    var email = $("email").value;

    // Kiểm tra các trường dữ liệu và thực hiện xử lý đăng ký
    if (password && confirmPassword && email) {
        if (password !== confirmPassword) {
            alert("Mật khẩu và xác nhận mật khẩu không khớp");
        } else {
            // Gửi dữ liệu đăng ký đến server hoặc xử lý theo ý của bạn
            alert("Đăng ký thành công!");
            // Reset form
            $(".auth-form-register").reset();
        }
    } else {
        alert("Vui lòng điền đầy đủ thông tin");
    }
});
document.addEventListener("DOMContentLoaded", function() {
    // Hiển thị modal khi ấn vào nút "Thêm vào giỏ hàng"
    document.querySelectorAll(".home-product-item__cart-order").forEach(function(btn) {
        btn.addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("myModal").style.display = "flex";
        });
    });

    // Đóng modal khi ấn vào nút đóng hoặc nút "×"
    document.querySelector(".close").addEventListener("click", function() {
        document.getElementById("myModal").style.display = "none";
    });

    // Đóng modal khi click bên ngoài modal
    window.addEventListener("click", function(event) {
        if (event.target == document.getElementById("myModal")) {
            document.getElementById("myModal").style.display = "none";
        }
    });
});
document.addEventListener("DOMContentLoaded", function() {
    // Hiển thị modal khi ấn vào nút "Thêm vào giỏ hàng"
    document.querySelectorAll(".home-product-item__cart-order").forEach(function(btn) {
        btn.addEventListener("click", function(event) {
            event.preventDefault();

            // Lấy giá trị từ các thẻ input
            var productId = this.parentElement.querySelector('input[name="id"]').value;
            var productName = this.parentElement.querySelector('input[name="name"]').value;
            var productImg = this.parentElement.querySelector('input[name="img"]').value;
            var productPrice = this.parentElement.querySelector('input[name="price"]').value;

            // Hiển thị giá trị trong modal
            document.getElementById("modalProductId").value = productId;
            document.getElementById("modalProductName").value = productName;
            document.getElementById("modalProductImg").value = productImg;
            document.getElementById("modalProductPrice").value = productPrice;

            document.getElementById("myModal").style.display = "block";
        });
    });


});


// Modal addCart

document.addEventListener("DOMContentLoaded", function() {
    // Hiển thị modal khi ấn vào nút "Thêm vào giỏ hàng"
    document.querySelectorAll(".home-product-item__cart-order").forEach(function(btn) {
        btn.addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("myModal").style.display = "block";
            // Lấy giá trị từ các thẻ input
            var productId = this.parentElement.querySelector('input[name="id"]').value;
            var productName = this.parentElement.querySelector('input[name="name"]').value;
            var productImg = this.parentElement.querySelector('input[name="img"]').value;
            var productPrice = this.parentElement.querySelector('input[name="price"]').value;

            // Hiển thị giá trị trong modal
            document.getElementById("modalProductId").value = productId;
            document.getElementById("modalProductName").value = productName;
            document.getElementById("modalProductImg").value = productImg;
            document.getElementById("modalProductPrice").value = productPrice;

            document.getElementById("myModal").style.display = "block";
        });
    });
    // Đóng modal khi ấn vào nút đóng hoặc nút "×"
    document.querySelector(".close").addEventListener("click", function() {
        document.getElementById("myModal").style.display = "none";
    });

    // Đóng modal khi click bên ngoài modal
    window.addEventListener("click", function(event) {
        if (event.target == document.getElementById("myModal")) {
            document.getElementById("myModal").style.display = "none";
        }
    });

});