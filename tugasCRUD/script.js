document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('login-form');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const username = form.username.value;
        const password = form.password.value;

        // Simpan logika validasi Anda di sini
        if (username === 'user' && password === 'password') {
            // Validasi berhasil, redirect atau tindakan selanjutnya
            window.location.href = 'dashboard.html';
        } else {
            errorMessage.textContent = 'Username atau password salah. Coba lagi.';
        }
    });
});
