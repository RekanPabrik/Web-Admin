document.addEventListener("DOMContentLoaded", function () {
    const data = window.apiData;
    loadAdmin(data);
    loadPelamar(data);
    loadPerusahaan(data);
});

function loadAdmin(data) {
    const adminElement = document.querySelector(".stat-number.admin");
    const tbody = $("#AdminTable tbody");
    adminElement.textContent = data.jumlahData.jumlahAdmin;

    tbody.empty();

    if (
        !data.dataUserWebsite.jumlahAdmin.data ||
        data.dataUserWebsite.jumlahAdmin.data.length === 0
    ) {
        tbody.append(
            `<tr>
                <td colspan="4" style="text-align: center;">Data Not Found</td>
            </tr>`
        );
    } else {
        data.dataUserWebsite.jumlahAdmin.data.forEach((admin, index) => {
            const row = `
          <tr>
            <td>${index + 1}</td>
            <td>${admin.first_name} ${admin.last_name}</td>
            <td>${admin.email}</td>
            <td>
              <button  class="adminEditBTN action-btn edit-btn" data-id="${
                  admin.id_admin
              }" data-name="${admin.first_name} ${
                admin.last_name
            }">Edit</button>
              <button  class="adminDeleteBTN action-btn delete-btn" data-id="${
                  admin.id_admin
              }" data-name="${admin.first_name} ${
                admin.last_name
            }">Delete</button>
            </td>
          </tr>
        `;
            tbody.append(row);
        });

        $(".adminEditBTN").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            editUserAdmin(userId, name);
        });

        $(".adminDeleteBTN").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            deleteUserAdmin(userId, name);
        });
    }
}

function loadPelamar(data) {
    const pelamarElement = document.querySelector(".stat-number.pelamar");
    pelamarElement.innerHTML = data.jumlahData.jumlahPelamar;
    const tbody = $("#pelamarTable tbody");
    tbody.empty();

    if (
        !data.dataUserWebsite.jumlahPelamar.data ||
        data.dataUserWebsite.jumlahPelamar.data.length === 0
    ) {
        tbody.append(
            `<tr>
                <td colspan="4" style="text-align: center;">Data Not Found</td>
            </tr>`
        );
    } else {
        data.dataUserWebsite.jumlahPelamar.data.forEach((pelamar, index) => {
            const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${pelamar.first_name} ${pelamar.last_name}</td>
                            <td>${pelamar.email}</td>
                            <td>
                                <button class="pelamarEditBTN action-btn edit-btn" data-id="${
                                    pelamar.id_pelamar
                                }" data-name="${pelamar.first_name} ${
                pelamar.last_name
            }">Edit</button>
                                <button class="pelamarDeleteBTN action-btn delete-btn" data-id="${
                                    pelamar.id_pelamar
                                }" data-name="${pelamar.first_name} ${
                pelamar.last_name
            }">Delete</button>
                            </td>
                        </tr>
                    `;

            tbody.append(row);
        });

        $(".pelamarEditBTN").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            editUserPelamar(userId, name);
        });

        $(".pelamarDeleteBTN").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            deleteUserPelamar(userId, name);
        });
    }
}

function loadPerusahaan(data) {
    const Perusahaanelement = document.querySelector(".stat-number.Perusahaan");
    const tbody = $("#PerusahaanTable tbody");
    Perusahaanelement.innerHTML = data.jumlahData.jumlahPerusahaan;
    tbody.empty();

    if (
        !data.dataUserWebsite.jumlahPerusahaan.data ||
        data.dataUserWebsite.jumlahPerusahaan.data.length === 0
    ) {
        tbody.append(
            `<tr>
                <td colspan="4" style="text-align: center;">Data Not Found</td>
            </tr>`
        );
    } else {
        data.dataUserWebsite.jumlahPerusahaan.data.forEach((Perusahaan, index) => {
            const row = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${Perusahaan.nama_perusahaan}</td>
                        <td>${Perusahaan.email}</td>
                        <td>
                            <button class="PerusahaanEditBTN action-btn edit-btn" data-id="${
                                Perusahaan.id_perusahaan
                            }" data-name="${Perusahaan.nama_perusahaan}">Edit</button>
                            <button class="PerusahaanDeleteBTN action-btn delete-btn" data-id="${
                                Perusahaan.id_perusahaan
                            }" data-name="${
                Perusahaan.nama_perusahaan
            } ">Delete</button>
                        </td>
                    </tr>
                `;

            tbody.append(row);
        });

        $(".PerusahaanEditBTN").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            editUserPerusahaan(userId, name);
        });

        $(".PerusahaanDeleteBTN").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            deleteUserPerusahaan(userId, name);
        });
    }
}

function editUserAdmin(userId, name) {
    const confirmDelete = confirm(`Apakah kamu ingin mengedit akun: ${name} ?`);
    if (confirmDelete) {
        Swal.fire({
            title: "success!",
            text: `Berhasil mengedit akun ${name}`,
            icon: "success",
            confirmButtonText: "lanjutkan",
        });
    }
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

function editUserPerusahaan(userId, name) {
    const confirmDelete = confirm(`Apakah kamu ingin mengedit akun: ${name} ?`);
    if (confirmDelete) {
        Swal.fire({
            title: "success!",
            text: `Berhasil mengedit akun ${name}`,
            icon: "success",
            confirmButtonText: "lanjutkan",
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

function editUserPelamar(userId, name) {
    const confirmDelete = confirm(`Apakah kamu ingin mengedit akun: ${name} ?`);
    if (confirmDelete) {
        Swal.fire({
            title: "success!",
            text: `Berhasil mengedit akun ${name}`,
            icon: "success",
            confirmButtonText: "lanjutkan",
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
