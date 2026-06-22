document.addEventListener("livewire:navigated", () => {
    // 1. MANAJEMEN RESPONSIVE SIDEBAR MOBILE
    const menuToggle = document.getElementById("menuToggle");
    const sidebar = document.getElementById("sidebar");

    if (menuToggle && sidebar) {
        menuToggle.addEventListener("click", (e) => {
            e.stopPropagation();
            sidebar.classList.toggle("open");
        });

        document.addEventListener("click", (e) => {
            if (
                sidebar.classList.contains("open") &&
                !sidebar.contains(e.target) &&
                e.target !== menuToggle
            ) {
                sidebar.classList.remove("open");
            }
        });
    }

    // 2. INTERAKSI WINDOW MODAL PADA KELOLA ORDER
    const orderModal = document.getElementById("orderModal");
    const closeModal = document.getElementById("closeModal");
    const editTriggers = document.querySelectorAll(".edit-trigger");

    // 3. LOGIKA INTERAKTIF FORM MODAL HALAMAN ORDER MASUK
    const verificationModal = document.getElementById("verificationModal");
    const closeVerificationModal = document.getElementById(
        "closeVerificationModal",
    );
    const cancelConfirmModal = document.getElementById("cancelConfirmModal");
    const closeCancelModal = document.getElementById("closeCancelModal");

    const verifyClientName = document.getElementById("verifyClientName");
    const verifyClientWa = document.getElementById("verifyClientWa");
    const verifyServiceType = document.getElementById("verifyServiceType");
    const verifyFinalPrice = document.getElementById("verifyFinalPrice");
    const verifyOrderNote = document.getElementById("verifyOrderNote");
    const cancelClientTarget = document.getElementById("cancelClientTarget");

    if (closeVerificationModal && verificationModal) {
        closeVerificationModal.addEventListener("click", () =>
            verificationModal.classList.remove("show"),
        );
    }

    if (closeCancelModal && cancelConfirmModal) {
        closeCancelModal.addEventListener("click", () =>
            cancelConfirmModal.classList.remove("show"),
        );
    }

    const submitToProgressBtn = document.getElementById("submitToProgressBtn");
    if (submitToProgressBtn && verificationModal) {
        submitToProgressBtn.addEventListener("click", () => {
            if (verifyFinalPrice && !verifyFinalPrice.value) {
                alert("Mohon masukkan harga deal kesepakatan akhir!");
                return;
            }
            alert(
                "Sukses! Status order diperbarui menjadi 'Progress' dan dipindahkan ke halaman Kelola Order.",
            );
            verificationModal.classList.remove("show");
        });
    }

    const confirmDeleteOrderBtn = document.getElementById(
        "confirmDeleteOrderBtn",
    );
    if (confirmDeleteOrderBtn && cancelConfirmModal) {
        confirmDeleteOrderBtn.addEventListener("click", () => {
            alert("Order masuk berhasil dibatalkan dan dihapus dari antrean.");
            cancelConfirmModal.classList.remove("show");
        });
    }

    // 4. CLOSING WINDOW MODAL OVERLAY ON CLICK BACKGROUND AREA (SAFE CHECK)
    window.addEventListener("click", (e) => {
        if (orderModal && e.target === orderModal)
            orderModal.classList.remove("show");
        if (verificationModal && e.target === verificationModal)
            verificationModal.classList.remove("show");
        if (cancelConfirmModal && e.target === cancelConfirmModal)
            cancelConfirmModal.classList.remove("show");
    });

    // 5. KEYBOARD ESCAPE FUNCTION
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            if (orderModal) orderModal.classList.remove("show");
            if (verificationModal) verificationModal.classList.remove("show");
            if (cancelConfirmModal) cancelConfirmModal.classList.remove("show");
            if (sidebar) sidebar.classList.remove("open");
        }
    });

    // 6. INTERAKSI CRUD POPUP FORM LAYANAN PRICELIST
    const addPriceBtn = document.getElementById("addPriceBtn");
    const priceModal = document.getElementById("priceModal");
    const closePriceModal = document.getElementById("closePriceModal");
    const editPriceTriggers = document.querySelectorAll(".edit-price-trigger");

    const priceCategory = document.getElementById("priceCategory");
    const priceName = document.getElementById("priceName");
    const priceAmount = document.getElementById("priceAmount");
    const priceIconClass = document.getElementById("priceIconClass");

    if (closePriceModal && priceModal) {
        closePriceModal.addEventListener("click", () =>
            priceModal.classList.remove("show"),
        );
    }

    const savePriceBtn = document.getElementById("savePriceBtn");
    if (savePriceBtn && priceModal) {
        savePriceBtn.addEventListener("click", () => {
            if (
                !priceName.value ||
                !priceAmount.value ||
                !priceIconClass.value
            ) {
                alert("Mohon lengkapi seluruh field data master pricelist!");
                return;
            }
            alert(
                "Sukses! Data harga master pricelist berhasil diperbarui di database.",
            );
            priceModal.classList.remove("show");
        });
    }

    // Tambahkan juga penutupan priceModal area luar di event global window click milikmu:
    window.addEventListener("click", (e) => {
        if (priceModal && e.target === priceModal)
            priceModal.classList.remove("show");
    });
});

// Halaman Pengaturan
/**
 * Fungsi inisialisasi klik tombol lihat password dinamis pada panel admin
 */
function initPasswordEyeToggles() {
    const eyeButtons = document.querySelectorAll(".btn-eye-toggle");

    eyeButtons.forEach((button) => {
        // Hindari penumpukan event listener ganda
        button.replaceWith(button.cloneNode(true));
    });

    // Ambil ulang elemen pasca klon untuk dipasang listener baru
    document.querySelectorAll(".btn-eye-toggle").forEach((button) => {
        button.addEventListener("click", function (e) {
            e.preventDefault();

            const targetId = this.getAttribute("data-target");
            const inputField = document.getElementById(targetId);
            const icon = this.querySelector("i");

            if (inputField && icon) {
                const isPassword =
                    inputField.getAttribute("type") === "password";

                // Alihkan tipe inputan text / password
                inputField.setAttribute(
                    "type",
                    isPassword ? "text" : "password",
                );

                // Mutasi visual kelas ikon FontAwesome
                if (isPassword) {
                    icon.classList.remove("fa-eye");
                    icon.classList.add("fa-eye-slash");
                } else {
                    icon.classList.remove("fa-eye-slash");
                    icon.classList.add("fa-eye");
                }
            }
        });
    });
}

// Jalankan saat dokumen awal siap dimuat
document.addEventListener("DOMContentLoaded", () => {
    initPasswordEyeToggles();
});

// Jalankan ulang setiap kali Livewire selesai melakukan update komponen di layar
document.addEventListener("livewire:navigated", () => {
    initPasswordEyeToggles();
});
document.addEventListener("livewire:update", () => {
    initPasswordEyeToggles();
});
