document.addEventListener("DOMContentLoaded", function () {
    const passwordInput = document.getElementById("adminPassword");
    const togglePasswordBtn = document.getElementById("togglePassword");
    const eyeIcon = document.getElementById("eyeIcon");

    // Aksi Toggle Sembunyi / Lihat Password
    if (togglePasswordBtn && passwordInput) {
        togglePasswordBtn.addEventListener("click", function () {
            const isPassword =
                passwordInput.getAttribute("type") === "password";

            passwordInput.setAttribute(
                "type",
                isPassword ? "text" : "password",
            );

            if (isPassword) {
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        });
    }
});
