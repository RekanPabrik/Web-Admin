document.addEventListener("DOMContentLoaded", function () {
    const data = window.apiData;
    loadAdmin(data);
    loadPelamar(data);
    loadPerusahaan(data);
    loadPekerjaan(data);
});

let adminCount = 0;
let pelamarCount = 0;
let PerusahaanCount = 0;
let pekerjaanCount = 0;

function loadAdmin(data) {
    const adminElement = document.querySelector(".stat-number.admin");

    if (data.jumlahData.jumlahAdmin !== undefined) {
        adminElement.textContent = data.jumlahData.jumlahAdmin;
        adminCount = data.jumlahData.jumlahAdmin;
        chartView();
    } else {
        adminElement.textContent = "DATA NOT FOUND";
        console.error("Error: jumlahAdmin not found in apiData");
    }
}

function loadPelamar(data) {
    const pelamarElement = document.querySelector(".stat-number.pelamar");

    if (data.jumlahData.jumlahPelamar !== undefined) {
        pelamarElement.textContent = data.jumlahData.jumlahPelamar;
        pelamarCount = data.jumlahData.jumlahPelamar;
        chartView();
    } else {
        pelamarElement.textContent = "DATA NOT FOUND";
        console.error("Error: jumlahPelamar not found in apiData");
    }
}

function loadPerusahaan(data) {
    const PerusahaanElement = document.querySelector(".stat-number.Perusahaan");

    if (data.jumlahData.jumlahPerusahaan !== undefined) {
        PerusahaanElement.textContent = data.jumlahData.jumlahPerusahaan;
        PerusahaanCount = data.jumlahData.jumlahPerusahaan;
        chartView();
    } else {
        PerusahaanElement.textContent = "DATA NOT FOUND";
        console.error("Error: jumlahPerusahaan not found in apiData");
    }
}

function loadPekerjaan(data) {
    const jumlahPekerjaan = document.querySelector(
        ".stat-number.jumlahPekerjaan"
    );

    if (data.jumlahData.jumlahPostinganPekerjaan !== undefined) {
        jumlahPekerjaan.textContent = data.jumlahData.jumlahPostinganPekerjaan;
        pekerjaanCount = data.jumlahData.jumlahPostinganPekerjaan;
        chartView();
    } else {
        jumlahPekerjaan.textContent = "DATA NOT FOUND";
        console.error("Error: jumlahPostPekerjaan not found in apiData");
    }
}

function chartView() {
    if (
        adminCount === 0 &&
        pelamarCount === 0 &&
        PerusahaanCount === 0 &&
        pekerjaanCount === 0
    )
        return;

    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
            ["Kategori", "Jumlah"],
            ["Admin", adminCount],
            ["Pelamar", pelamarCount],
            ["Perusahaan", PerusahaanCount],
            ["Pekerjaan", pekerjaanCount],
        ]);

        const options = {
            colors: ["#4CAF50", "#FF9800", "#03A9F4", "#E91E63"],
        };

        const chart = new google.visualization.PieChart(
            document.getElementById("myChart")
        );
        chart.draw(data, options);
    }
}
