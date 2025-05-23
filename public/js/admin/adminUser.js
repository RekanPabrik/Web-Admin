document.addEventListener("DOMContentLoaded", function () {
    const data = window.apiData;
    loadAdmin(data);
    loadPelamar(data);
    loadPerusahaan(data);
    addUser()
});

function paginateData(dataArray, containerSelector, paginationSelector, renderRowCallback, deleteBtnClass, deleteCallback) {
    const itemsPerPage = 5;
    const container = $(containerSelector);
    const pagination = $(paginationSelector);

    function renderPage(page) {
        container.empty();
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageData = dataArray.slice(start, end);

        if (pageData.length === 0) {
            container.append(`<tr><td colspan="4" style="text-align: center;">Data Not Found</td></tr>`);
        } else {
            pageData.forEach((item, index) => {
                const row = renderRowCallback(item, index + start);
                container.append(row);
            });
        }

        // Event for delete buttons
        $(deleteBtnClass).off("click").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            deleteCallback(userId, name);
        });
    }

    function renderPagination() {
        pagination.empty();
        const totalPages = Math.ceil(dataArray.length / itemsPerPage);

        for (let i = 1; i <= totalPages; i++) {
            const btn = $(`<span class="pagination-btn">${i}</span>`);
            if (i === 1) btn.addClass("active");
            btn.on("click", function () {
                $(".pagination-btn").removeClass("active");
                $(this).addClass("active");
                renderPage(i);
            });
            pagination.append(btn);
        }
    }

    if (dataArray.length > itemsPerPage) {
        renderPagination();
    } else {
        pagination.empty();
    }

    renderPage(1);
}


function loadAdmin(data) {
    const adminElement = document.querySelector(".stat-number.admin");
    adminElement.textContent = data.jumlahData.jumlahAdmin;

    const dataArray = data.dataUserWebsite.jumlahAdmin.data || [];
    paginateData(
        dataArray,
        "#AdminTable tbody",
        "#adminPagination",
        (admin, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${admin.first_name} ${admin.last_name}</td>
                <td>${admin.email}</td>
                <td>
                    <button class="adminDeleteBTN action-btn delete-btn" data-id="${admin.id_admin}" data-name="${admin.first_name} ${admin.last_name}">Delete</button>
                </td>
            </tr>`,
        ".adminDeleteBTN",
        deleteUserAdmin
    );
}


function loadPelamar(data) {
    const pelamarElement = document.querySelector(".stat-number.pelamar");
    pelamarElement.innerHTML = data.jumlahData.jumlahPelamar;

    const dataArray = data.dataUserWebsite.jumlahPelamar.data || [];
    paginateData(
        dataArray,
        "#pelamarTable tbody",
        "#pelamarPagination",
        (pelamar, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${pelamar.first_name} ${pelamar.last_name}</td>
                <td>${pelamar.email}</td>
                <td>
                    <button class="pelamarDeleteBTN action-btn delete-btn" data-id="${pelamar.id_pelamar}" data-name="${pelamar.first_name} ${pelamar.last_name}">Delete</button>
                </td>
            </tr>`,
        ".pelamarDeleteBTN",
        deleteUserPelamar
    );
}


function loadPerusahaan(data) {
    const Perusahaanelement = document.querySelector(".stat-number.Perusahaan");
    Perusahaanelement.innerHTML = data.jumlahData.jumlahPerusahaan;

    const dataArray = data.dataUserWebsite.jumlahPerusahaan.data || [];
    paginateData(
        dataArray,
        "#PerusahaanTable tbody",
        "#perusahaanPagination",
        (perusahaan, index) => `
            <tr>
                <td>${index + 1}</td>
                <td>${perusahaan.nama_perusahaan}</td>
                <td>${perusahaan.email}</td>
                <td>
                    <button class="PerusahaanDeleteBTN action-btn delete-btn" data-id="${perusahaan.id_perusahaan}" data-name="${perusahaan.nama_perusahaan}">Delete</button>
                </td>
            </tr>`,
        ".PerusahaanDeleteBTN",
        deleteUserPerusahaan
    );
}


function deleteUserAdmin(userId, name) {
    const dataID = { id_admin: userId };
    const confirmDelete = confirm(
        `Apakah kamu ingin menghapus akun: ${name} ?`
    );
    if (confirmDelete) {
        fetch("/admin/deleteAdmin", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify(dataID),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to delete user.");
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    console.log(data)
                    Swal.fire({
                        title: "success!",
                        text: `Berhasil menghapus akun ${name}`,
                        icon: "success",
                        confirmButtonText: "lanjutkan",
                    });
                } else {
                    console.log(data)
                    Swal.fire({
                        
                        title: "Error!",
                        text: data.error || "Gagal menghapus user",
                        icon: "error",
                        confirmButtonText: "Coba Lagi",
                    });
                }
            })
            .catch((error) => {
                console.error("Error ketika menghapus user:", error);
                Swal.fire({
                    title: "Error!",
                    text: "Terjadi kesalahan saat menghapus user",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            });
    }
}

function deleteUserPerusahaan(userId, name) {
    const dataID = { id_perusahaan: userId };
    const confirmDelete = confirm(
        `Apakah kamu ingin menghapus perusahaan: ${name} ?`
    );
    if (confirmDelete) {
        fetch("/admin/deletePerusahaan", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify(dataID),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to delete user.");
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        title: "success!",
                        text: `Berhasil menghapus perusahaan ${name}`,
                        icon: "success",
                        confirmButtonText: "lanjutkan",
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: data.error || "Gagal menghapus user",
                        icon: "error",
                        confirmButtonText: "Coba Lagi",
                    });
                }
            })
            .catch((error) => {
                console.error("Error ketika menghapus user:", error);
                Swal.fire({
                    title: "Error!",
                    text: "Terjadi kesalahan saat menghapus user",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            });
    }
}

function deleteUserPelamar(userId, name) {
    const dataID = { id_pelamar: userId };
    const confirmDelete = confirm(
        `Apakah kamu ingin menghapus akun: ${name} ?`
    );
    if (confirmDelete) {
        fetch("/admin/deletePelamar", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify(dataID),
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Failed to delete user.");
                }
                return response.json();
            })
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        title: "success!",
                        text: `Berhasil menghapus akun ${name}`,
                        icon: "success",
                        confirmButtonText: "lanjutkan",
                    });
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: data.error || "Gagal menghapus user",
                        icon: "error",
                        confirmButtonText: "Coba Lagi",
                    });
                }
            })
            .catch((error) => {
                console.error("Error ketika menghapus user:", error);
                Swal.fire({
                    title: "Error!",
                    text: "Terjadi kesalahan saat menghapus user",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            });
    }
}

function addUser() {
    const tambahBtn = document.getElementById("tambahBtn");
    const modal = document.getElementById("modal");
    const closeBtn = document.querySelector(".close");
    const userForm = document.getElementById("userForm");

    tambahBtn.addEventListener("click", () => {
        modal.style.display = "block";
    });

    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    window.addEventListener("click", (event) => {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });

    userForm.addEventListener("submit", async (event) => {
        event.preventDefault(); 

        const first_name = document.getElementById("first_name").value;
        const last_name = document.getElementById("last_name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirm_password").value;
        const passwordError = document.getElementById("passwordError");

        if (password !== confirmPassword) {
            passwordError.style.display = "block";
            return;
        } else {
            passwordError.style.display = "none";
        }

        if (!first_name || !last_name || !email || !password || !confirmPassword) {
            alert("Harap lengkapi semua input.");
            return;
        }

        const formData = new FormData();
        formData.append("first_name", first_name);
        formData.append("last_name", last_name);
        formData.append("email", email);
        formData.append("password", password);

        try {
            const response = await fetch("/admin/addAdmin", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
            });
            const result = await response.json();
            console.log(result)
            if (result.success) {
                Swal.fire({
                    title: "success!",
                    text: `Berhasil menambahkan user`,
                    icon: "success",
                    confirmButtonText: "lanjutkan",
                });
                document.getElementById("modal").style.display = "none";
            } else {
                Swal.fire({
                    title: "Gagal menambahkan admin!",
                    text: "Email admin sudah terdaftar",
                    icon: "error",
                    confirmButtonText: "Coba Lagi",
                });
            }
        } catch (error) {
            console.error("Error ketika menambahkan user:", error);
            Swal.fire({
                title: "Error!",
                text: error||"Terjadi kesalahan saat menambahkan admin",
                icon: "error",
                confirmButtonText: "Coba Lagi",
            });
        }
    });
}