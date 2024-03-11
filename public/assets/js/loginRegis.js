$(document).ready(function() {
    const signUpForm = $('.sign-up-form');

    $('#sign-up-btn').on('click', function() {
        $('.container').addClass('sign-up-mode');
    });

    $('#sign-in-btn').on('click', function() {
        $('.container').removeClass('sign-up-mode');
    });
    signUpForm.on('submit', function(event) {
        const password = $('#password').val();
        const confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
            event.preventDefault(); // Ngăn chặn biểu mẫu nếu mật khẩu không khớp
            alert('Mật khẩu và mật khẩu lặp lại không khớp. Vui lòng thử lại.');
        }
    });
});