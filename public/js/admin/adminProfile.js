document.addEventListener("DOMContentLoaded", function () {
    const data = window.apiData;

    displayData(data);
});

function displayData(data) {
    const profileName = document.getElementById("profileName");
    const profileBio = document.getElementById("profileBio");
    const Fname = document.getElementById("Fname");
    const Lname = document.getElementById("Lname");
    const email = document.getElementById("email");

    profileName.textContent = `${data.user.first_name} ${data.user.last_name}`;
    profileBio.textContent = `${data.user.role}`;
    Fname.textContent = `${data.user.first_name}`;
    Lname.textContent = `${data.user.last_name}`;
    email.textContent = `${data.user.email}`;
}

function toggleEdit() {
    const form = document.getElementById("editForm");
    form.classList.toggle("active");

    if (form.classList.contains("active")) {
        document.getElementById("firstNameInput").value =
            document.getElementById("Fname").innerText;
        document.getElementById("lastNameInput").value =
            document.getElementById("Lname").innerText;
        document.getElementById("Role").value =
            document.getElementById("profileBio").innerText;
        document.getElementById("emailInput").value =
            document.getElementById("email").innerText;
    }
}

function updateProfile() {
    const userData = window.apiData.user;
    const updatedData = {
        id_admin: userData.id_admin,
        first_name: document.getElementById("firstNameInput").value,
        last_name: document.getElementById("lastNameInput").value,
        role: document.getElementById("Role").value,
        email: document.getElementById("emailInput").value,
    };
    console.log(updatedData);
    const isDataChanged = Object.keys(updatedData).some(
        (key) => updatedData[key] !== userData[key]
    );

    if (!isDataChanged) {
        Swal.fire({
            title: "Ooopss!",
            text: `Data anda adalah data terbaru`,
            icon: "info",
            confirmButtonText: "lanjutkan",
        });
        return;
    } else {
        fetch("/admin/updateProfile", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify(updatedData),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        title: "Success!",
                        text: `Profile berhasil diupdate`,
                        icon: "success",
                        confirmButtonText: "Lanjutkan",
                    });
                    document
                        .getElementById("editForm")
                        .classList.remove("active");
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: data.error || "Failed to update profile",
                        icon: "error",
                        confirmButtonText: "Coba Lagi",
                    });
                    console.log(data.error);
                }
            })
            .catch((error) => {
                console.error("Error updating profile:", error);
                Swal.fire({
                    title: "Error!",
                    text: "Terjadi kesalahan saat memperbarui profil",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            });
    }
}

function logout() {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan keluar dari sesi ini.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Iya, logout',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('/logout', {
                method: 'POST',
                credentials: 'include',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = '/loginPage';
                } else {
                    Swal.fire({
                        title: 'Gagal Logout',
                        text: 'Terjadi masalah saat logout. Silakan coba lagi.',
                        icon: 'error'
                    });
                }
            })
            .catch(error => {
                console.error('Logout error:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Terjadi kesalahan jaringan. Silakan coba lagi.',
                    icon: 'error'
                });
            });
        }
    });
}