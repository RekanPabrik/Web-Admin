document.addEventListener("DOMContentLoaded", function () {
    window.onscroll = function () {
        scrollFunction();
    };
    document.querySelector('.btnContainer button').addEventListener('click', requestResetPassword);
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

function requestResetPassword(){
     const emailInput = document.getElementById('emailResetPass').value;
     if (emailInput === '') {
         Swal.fire({
             icon: 'error',
             title: 'Error!',
             text: 'Email tidak boleh kosong!',
         });
     } else {
        fetch("/reqResetPass", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({email: emailInput}),
        }).then((response) => {
            if (!response.ok) {
                throw new Error("Gagal mengirimkan permintaan.");
            }
            return response.json();
        }).then((data) => {
            if (data.success) {
                Swal.fire({
                    title: "success!",
                    text: `Silahkan cek email anda`,
                    icon: "success",
                    confirmButtonText: "lanjutkan",
                });
                countDown();
            } else {
                console.log(data.error )
                Swal.fire({
                    title: "Error!",
                    text: data.error || "Gagal mengirimkan permintaan",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            }
        })
        .catch((error) => {
            console.error("Error ketika mengirimkan permintaan:", error);
            Swal.fire({
                title: "Error!",
                text: "Terjadi kesalahan saat mengirimkan permintaan",
                icon: "error",
                confirmButtonText: "Coba Lagi",
            });
        });
     }
}

function countDown(){
    const button = document.querySelector('.btnContainer button');
    button.disabled = true;

    let countdown = 60;
    button.textContent = `Kirim (${countdown}s)`;
    const timer = setInterval(() => {
        countdown--;
        button.textContent = `Kirim (${countdown}s)`;

        if (countdown <= 0) {
            clearInterval(timer); 
            button.disabled = false; 
            button.textContent = 'Kirim'; 
        }
    }, 1000); 
}