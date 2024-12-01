document.addEventListener("DOMContentLoaded", function () {
    const data = window.apiData;
    console.log(data);

    // Panggil fungsi untuk menampilkan data
    tampilkanData(data);
});

function tampilkanData(data) {
    if (data && data.dataLaporan && data.dataLaporan.data) {
        const applications = data.dataLaporan.data.map((item, index) => ({
            nomor: index + 1,
            nama: `${item.nama_depan_pelamar} ${item.nama_belakang_pelamar}`,
            posisi: item.posisi_pekerjaan,
            namaPerusahaan: item.nama_perusahaan,
            status: item.status_lamaran
        }));

        window.jobApplications = applications;

        displayData(applications);
    } else {
        console.error("Data laporan tidak tersedia!");
    }
}

function displayData(data) {
    const tableBody = document.getElementById("tableBody");
    tableBody.innerHTML = "";

    data.forEach(item => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${item.nomor}</td> 
            <td>${item.nama}</td>
            <td>${item.posisi}</td>
            <td>${item.namaPerusahaan}</td>
            <td><span class="status ${getStatusClass(item.status)}">${item.status}</span></td>
        `;
        tableBody.appendChild(row);
    });
}

function getStatusClass(status) {
    switch (status.toLowerCase()) {
        case "diproses":
            return "in-progress";
        case "diterima":
            return "accepted";
        case "ditolak":
            return "rejected";
        default:
            return "";
    }
}

function filterData() {
    const searchTerm = document.getElementById("searchInput").value.toLowerCase();
    const statusFilter = document.getElementById("statusFilter").value;

    const filteredData = window.jobApplications.filter(item => {
        const matchSearch =
            item.nama.toLowerCase().includes(searchTerm) ||
            item.posisi.toLowerCase().includes(searchTerm);
        const matchStatus =
            statusFilter === "all" || item.status.toLowerCase() === statusFilter.toLowerCase();
        return matchSearch && matchStatus;
    });

    displayData(filteredData);
}

// Event listeners untuk filter
document.getElementById("searchInput").addEventListener("input", filterData);
document.getElementById("statusFilter").addEventListener("change", filterData);
