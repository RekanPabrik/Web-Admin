document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("navbar");
    const data = window.apiData;
    window.onscroll = function () {
        scrollFunction(navbar);
    };
    loadPerusahaan(data.perusahaan.data);
});

function scrollFunction(navbar) {
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

function loadPerusahaan(perusahaanList) {
    const container = $("#card-container");
    const errorMessage = $("#error-message");

    container.empty();
    errorMessage.hide();

    if (!Array.isArray(perusahaanList) || perusahaanList.length === 0) {
        errorMessage.text("Data perusahaan kosong").show();
        return;
    }

    perusahaanList.forEach((item) => {
        const card = `
  <div class="card">
    <div class="card-img-wrapper">
      <img src="${
          item.profile_pict || "https://via.placeholder.com/150"
      }" alt="${item.nama_perusahaan}">
    </div>
    <div class="card-content">
      <h2>${item.nama_perusahaan}</h2>
      <p>${item.about_me || "Deskripsi tidak tersedia"}</p>
    </div>
  </div>
`;

        container.append(card);
    });

    slider();
}

function slider() {
    const cardContainer = document.querySelector(".card-container");
    const cards = document.querySelectorAll(".card");

    cards.forEach((card) => {
        const clone = card.cloneNode(true);
        cardContainer.appendChild(clone);
    });

    let position = 0;
    const speed = 0.5;

    function moveCards() {
        position -= speed;

        const totalWidth = cards[0].offsetWidth * cards.length;
        if (Math.abs(position) >= totalWidth) {
            position = 0;
        }

        cardContainer.style.transform = `translateX(${position}px)`;
        requestAnimationFrame(moveCards);
    }

    moveCards();

    cardContainer.addEventListener("mouseenter", () => {
        cardContainer.style.animationPlayState = "paused";
    });

    cardContainer.addEventListener("mouseleave", () => {
        cardContainer.style.animationPlayState = "running";
    });
}
