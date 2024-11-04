document.addEventListener("DOMContentLoaded", function () {
    const data = window.apiData;
    loadAdmin(data);
    loadPelamar(data);
    loadHRD(data);
    loadPekerjaan(data);
});

let adminCount = 0;
let pelamarCount = 0;
let hrdCount = 0;
let pekerjaanCount = 0;

function loadAdmin(data) {
    const adminElement = document.querySelector(".stat-number.admin");

    if (data.jumlahAdmin !== undefined) {
        adminElement.textContent = data.jumlahAdmin;
        adminCount = data.jumlahAdmin;
        chartView();
    } else {
        adminElement.textContent = "DATA NOT FOUND";
        console.error("Error: jumlahAdmin not found in apiData");
    }
}

function loadPelamar(data) {
    const pelamarElement = document.querySelector(".stat-number.pelamar");

    if (data.jumlahPelamar !== undefined) {
        pelamarElement.textContent = data.jumlahPelamar;
        pelamarCount = data.jumlahPelamar;
        chartView();
    } else {
        pelamarElement.textContent = "DATA NOT FOUND";
        console.error("Error: jumlahPelamar not found in apiData");
    }
}

function loadHRD(data) {
    const hrdElement = document.querySelector(".stat-number.HRD");

    if (data.jumlahPerusahaan !== undefined) {
        hrdElement.textContent = data.jumlahPerusahaan;
        hrdCount = data.jumlahPerusahaan;
        chartView();
    } else {
        hrdElement.textContent = "DATA NOT FOUND";
        console.error("Error: jumlahHRD not found in apiData");
    }
}

function loadPekerjaan(data) {
    const jumlahPekerjaan = document.querySelector(
        ".stat-number.jumlahPekerjaan"
    );

    if (data.jumlahPostinganPekerjaan !== undefined) {
        jumlahPekerjaan.textContent = data.jumlahPostinganPekerjaan;
        pekerjaanCount = data.jumlahPostinganPekerjaan;
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
        hrdCount === 0 &&
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
            ["HRD", hrdCount],
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
