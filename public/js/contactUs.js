document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    window.onscroll = function () {
        scrollFunction(navbar);
    };

    const swiper = new Swiper(".slider-wrapper", {
        loop: true,
        grabCursor: true,
        spaceBetween: 30,

        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
});

async function formPengaduan(event) {
  const formContact = document.getElementById("formContact");
  const firstName = document.getElementById("fname").value;
  const lastName = document.getElementById("lname").value;
  const email = document.getElementById("email").value;
  const number = document.getElementById("number").value;
  const message = document.getElementById("message").value;

  event.preventDefault(); 
  const confirmDelete = confirm("Apakah kamu ingin mengirim pengaduan?");

  if (confirmDelete) {
      const formData = new FormData();
      formData.append("first_name", firstName);
      formData.append("last_name", lastName);
      formData.append("email", email);
      formData.append("nomor_telpon", number);
      formData.append("pesan", message);

      try {
          const response = await fetch('/addPengaduan', {
              method: 'POST',
              body: formData,
              headers: {
                  "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
              }
          });

          const result = await response.json();

          if (result.success) {
              Swal.fire({
                  title: "Success!",
                  text: "Pengaduan Anda akan kami proses",
                  icon: "success",
                  confirmButtonText: "Lanjutkan",
              });
          } else {
              Swal.fire({
                  title: "Error!",
                  text: result.message || "Gagal mengirim pengaduan",
                  icon: "error",
                  confirmButtonText: "Coba Lagi",
              });
          }
      } catch (error) {
          Swal.fire({
              title: "Error!",
              text: error.message || "Terjadi kesalahan saat mengirim pengaduan",
              icon: "error",
              confirmButtonText: "Coba Lagi",
          });
      }
  }
}


function scrollFunction(navbar) {
    if (
        document.body.scrollTop > 80 ||
        document.documentElement.scrollTop > 90
    ) {
        navbar.style.backgroundColor = "rgba(255, 255, 255, 0.28);";
        //navbar.style.backgroundColor = "rgba(4, 41, 58, 1)";
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
