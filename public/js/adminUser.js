document.addEventListener("DOMContentLoaded", function () {
    const data = window.apiData;
    loadAdmin(data);
    loadPelamar(data);
    loadHRD(data);
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
            <button class="action-btn edit-btn" data-id="${
                admin.id
            }" data-name="${admin.first_name} ${admin.last_name}">Edit</button>
            <button class="action-btn delete-btn" data-id="${
                admin.id
            }" data-name="${admin.first_name} ${
                admin.last_name
            }">Delete</button>
          </td>
        </tr>
      `;
            tbody.append(row);
        });

        $(".edit-btn").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            editUser(userId, name);
        });

        $(".delete-btn").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            deleteUser(userId, name);
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
                              <button class="action-btn edit-btn" data-id="${
                                  pelamar.id
                              }" data-name="${pelamar.first_name} ${
                pelamar.last_name
            }">Edit</button>
                              <button class="action-btn delete-btn" data-id="${
                                  pelamar.id
                              }" data-name="${pelamar.first_name} ${
                pelamar.last_name
            }">Delete</button>
                          </td>
                      </tr>
                  `;

            tbody.append(row);
        });

        $(".edit-btn").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            editUser(userId, name);
        });

        $(".delete-btn").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            deleteUser(userId, name);
        });
    }
}

function loadHRD(data) {
    const HRDelement = document.querySelector(".stat-number.HRD");
    const tbody = $("#HRDTable tbody");
    HRDelement.innerHTML = data.jumlahData.jumlahHRD;
    tbody.empty();

    if (
        !data.dataUserWebsite.jumlahHRD.data ||
        data.dataUserWebsite.jumlahHRD.data.length === 0
    ) {
        tbody.append(
            `<tr>
              <td colspan="4" style="text-align: center;">Data Not Found</td>
          </tr>`
        );
    } else {
        data.dataUserWebsite.jumlahHRD.data.forEach((hrd, index) => {
            const row = `
                  <tr>
                      <td>${index + 1}</td>
                      <td>${hrd.nama_perusahaan}</td>
                      <td>${hrd.email}</td>
                      <td>
                          <button class="action-btn edit-btn" data-id="${
                              hrd.id_perusahaan
                          }" data-name="${hrd.first_name} ${
                hrd.last_name
            }">Edit</button>
                          <button class="action-btn delete-btn" data-id="${
                              hrd.id_perusahaan
                          }" data-name="${hrd.first_name} ${
                hrd.last_name
            }">Delete</button>
                      </td>
                  </tr>
              `;

            tbody.append(row);
        });

        $(".edit-btn").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            editUser(userId, name);
        });

        $(".delete-btn").on("click", function () {
            const userId = $(this).data("id");
            const name = $(this).data("name");
            deleteUser(userId, name);
        });
    }
}

function editUser(userId, name) {
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

function deleteUser(userId, name) {
    const confirmDelete = confirm(
        `Apakah kamu ingin menghapus akun: ${name} ?`
    );
    if (confirmDelete) {
        Swal.fire({
            title: "success!",
            text: `Berhasil menghapus akun ${name}`,
            icon: "success",
            confirmButtonText: "lanjutkan",
        });
    }
}
