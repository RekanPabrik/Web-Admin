document.addEventListener("DOMContentLoaded", function () {
    window.onscroll = function () {
        scrollFunction();
    };
    document
        .querySelector(".btnContainer button")
        .addEventListener("click", requestResetPassword);
});

function scrollFunction() {
    const navbar = document.getElementById("navbar");

    if (
        document.body.scrollTop > 80 ||
        document.documentElement.scrollTop > 90
    ) {
        navbar.style.backgroundColor = "rgba(255, 255, 255, 0.28);";
        navbar.style.boxShadow = "0 4px 30px rgba(0, 0, 0, 0.1)";
        navbar.style.backdropFilter = "blur(7.9px)";
        navbar.style.webkitBackdropFilter = "blur(7.9px)";
        navbar.style.border = "1px solid rgba(255, 255, 255, 1)";
    } else {
        navbar.style.backgroundColor = "transparent";
        navbar.style.boxShadow = "";
        navbar.style.backdropFilter = "";
        navbar.style.webkitBackdropFilter = "";
        navbar.style.border = "";
    }
}

function requestResetPassword() {
    const emailInput = document.getElementById("emailResetPass").value;
    if (emailInput === "") {
        Swal.fire({
            icon: "error",
            title: "Error!",
            text: "Email tidak boleh kosong!",
        });
    } else {
        Swal.fire({
            title: "Memproses...",
            text: "Mohon tunggu sebentar",
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            },
        });

        setTimeout(() => {
            fetch("/reqResetPass", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({ email: emailInput }),
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Gagal mengirimkan permintaan.");
                    }
                    return response.json();
                })
                .then((data) => {
                    Swal.close();

                    if (data.success) {
                        if (data.success) {
                            Swal.fire({
                                title: "Berhasil!",
                                icon: "success",
                                html: `
            Kami telah mengirimkan link reset password ke email Anda.<br><br>
            📧 <strong>Silakan periksa kotak masuk (inbox)</strong> dan juga <strong>folder spam/junk</strong> pada email Anda.<br><br>
            Jika Anda tidak menerima email dalam beberapa menit, coba periksa kembali atau kirim ulang.
        `,
                                confirmButtonText: "Saya Mengerti",
                            });
                            countDown();
                        }

                        countDown();
                    } else {
                        console.log(data.error);
                        Swal.fire({
                            title: "Error!",
                            text: data.error || "Gagal mengirimkan permintaan",
                            icon: "error",
                            confirmButtonText: "Coba Lagi",
                        });
                    }
                })
                .catch((error) => {
                    Swal.close();
                    console.error(
                        "Error ketika mengirimkan permintaan:",
                        error
                    );
                    Swal.fire({
                        title: "Error!",
                        text: "Terjadi kesalahan saat mengirimkan permintaan",
                        icon: "error",
                        confirmButtonText: "Coba Lagi",
                    });
                });
        }, 3000); // ⏱️ Delay selama 3 detik
    }
}

function countDown() {
    const button = document.querySelector(".btnContainer button");
    button.disabled = true;

    let countdown = 60;
    button.textContent = `Kirim (${countdown}s)`;
    const timer = setInterval(() => {
        countdown--;
        button.textContent = `Kirim (${countdown}s)`;

        if (countdown <= 0) {
            clearInterval(timer);
            button.disabled = false;
            button.textContent = "Kirim";
        }
    }, 1000);
}
