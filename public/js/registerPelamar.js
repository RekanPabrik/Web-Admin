document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");
    const registrationForm = document.getElementById("registrationForm");

    window.onscroll = function () {
        scrollFunction(navbar);
    };
});

function scrollFunction(navbar) {
    if (
        document.body.scrollTop > 80 ||
        document.documentElement.scrollTop > 90
    ) {
        navbar.style.backgroundColor = "rgba(255, 255, 255, 0.28)";
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

async function createAccount(event) {
    event.preventDefault(); // Mencegah pengiriman form jika ada error

    let hasError = false;

    // Validasi First Name
    const firstName = document.getElementById("Fname");
    const firstNameError = document.getElementById("FnameError");
    if (firstName.value.trim() === "") {
        firstNameError.textContent = "First name is required.";
        firstNameError.style.display = "block";
        hasError = true;
    } else {
        firstNameError.textContent = "";
        firstNameError.style.display = "none";
    }

    // Validasi Last Name
    const lastName = document.getElementById("Lname");
    const lastNameError = document.getElementById("LnameError");
    if (lastName.value.trim() === "") {
        lastNameError.textContent = "Last name is required.";
        lastNameError.style.display = "block";
        hasError = true;
    } else {
        lastNameError.textContent = "";
        lastNameError.style.display = "none";
    }

    // Validasi Email
    const email = document.getElementById("email");
    const emailError = document.getElementById("emailError");
    if (email.value.trim() === "") {
        emailError.textContent = "Email is required.";
        emailError.style.display = "block";
        hasError = true;
    } else {
        emailError.textContent = "";
        emailError.style.display = "none";
    }

    // Validasi Password
    const password = document.getElementById("password");
    const passwordError = document.getElementById("passwordError");
    if (password.value.trim() === "") {
        passwordError.textContent = "Password is required.";
        passwordError.style.display = "block";
        hasError = true;
    } else {
        passwordError.textContent = "";
        passwordError.style.display = "none";
    }

    // Validasi Confirm Password
    const confirmPassword = document.getElementById("confirmpassword");
    const confirmPasswordError = document.getElementById(
        "confirmpasswordError"
    );
    if (confirmPassword.value.trim() === "") {
        confirmPasswordError.textContent = "Confirm password is required.";
        confirmPasswordError.style.display = "block";
        hasError = true;
    } else if (confirmPassword.value !== password.value) {
        confirmPasswordError.textContent = "Passwords do not match.";
        confirmPasswordError.style.display = "block";
        hasError = true;
    } else {
        confirmPasswordError.textContent = "";
        confirmPasswordError.style.display = "none";
    }

    if (!hasError) {
        const firstName = document.getElementById("Fname").value;
        const lastName = document.getElementById("Lname").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        
        const formData = new FormData();
        formData.append("email", email);
        formData.append("password", password);
        formData.append("first_name", firstName);
        formData.append("last_name", lastName);

        try {
            const response = await fetch("/createAccountPelamar", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            });
            const result = await response.json();
            if (result.success) {
                Swal.fire({
                    title: "Success!",
                    text: "Akun anda berhasil dibuat",
                    icon: "success",
                    confirmButtonText: "Lanjutkan",
                }).then(() => {
                    window.location.href = "/loginPage";
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: result.error || "Gagal membuat akun",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            }
        } catch (error) {
            console.error("Error ketika membuat akun:", error);
            Swal.fire({
                title: "Error!",
                text: error || "Terjadi kesalahan saat membuat akun",
                icon: "error",
                confirmButtonText: "Coba Lagi",
            });
        }
    }
}
