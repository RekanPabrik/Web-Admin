document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");
    const data = window.apiData;
    loadTasks(data.perusahaan.data);
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

function loadTasks(data) {
    const slidesContainer = document.getElementById("slides-container");
    const errorMessage = document.getElementById("error-message");

    slidesContainer.innerHTML = ""; // bersihkan container dulu
    errorMessage.style.display = "none"; // sembunyikan pesan dulu

    if (!data || data.length === 0) {
        errorMessage.style.display = "block";
        return;
    }

    data.forEach((company) => {
        const slide = createdTask(company);
        slidesContainer.appendChild(slide);
    });

    data.forEach((company) => {
        const slide = createdTask(company);
        slidesContainer.appendChild(slide);
    });
}

function createdTask(company) {
    const slide = document.createElement("div");
    slide.classList.add("slide");
    slide.style.border = "2px solid black";
    slide.style.borderRadius = "10px";
    slide.style.width = "294px";

    const img = document.createElement("img");
    img.src = company.profile_pict || "https://via.placeholder.com/150";
    img.alt = company.nama_perusahaan;

    const companyInfo = document.createElement("div");
    companyInfo.classList.add("company-info");

    const companyName = document.createElement("h2");
    companyName.textContent = company.nama_perusahaan;

    const jobCount = document.createElement("p");
    jobCount.textContent = `Jumlah Lowongan: ${company.jumlah_posting || 0}`;

    companyInfo.appendChild(companyName);
    companyInfo.appendChild(jobCount);
    slide.appendChild(img);
    slide.appendChild(companyInfo);

    return slide;
}
