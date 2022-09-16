$(document).ready(function () {
    $(".car").owlCarousel({
        loop: true,
        dots: false,
        center: true,
        margin: 3,
        nav: true,
        margin: 3,
        responsiveClass: true,
        responsive: {
            480: {
                items: 0,
            },
            768: {
                items: 5,
            },
            1000: {
                items: 7,
            },
        },
    });
});

$(".top-btn").click(function () {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});

var windowLength = window.innerWidth;
console.log(windowLength);

if (windowLength < 700) {
    document.getElementById("adminCharts").style.display = "none";
}

/*var elem = document.querySelector(".grid");
if (elem) {
    var msnry = new Masonry(elem, {
        // options
        itemSelector: ".grid-item",
        columnWidth: 100,
    });
}*/
import Masonry from "masonry-layout";
window.onload = () => {
var elem = document.querySelector(".grid");
if (elem) {
    var msnry = new Masonry(elem, {
        // options
        itemSelector: ".grid-item",
        columnWidth: 100,
    });
}}

if (document.querySelector("#editor")) {
  ClassicEditor.create(document.querySelector("#editor")).catch((error) => {
      console.error(error);
  });
}

/**
 * Login component
 * code to enable users to view what they've entered into input field
 * Basically password visibility toggle
 */
const eye = document.querySelector(".eye");
if (eye) {
    eye.addEventListener("click", () => {
        const eye_pass = document.querySelector(".eye-pswd");
        if (eye_pass.type == "password") {
            eye_pass.setAttribute("type", "text");
            eye.textContent = "visibility_off";
        } else {
            eye_pass.setAttribute("type", "password");
            eye.textContent = "visibility";
        }
    });
}



//picture preview code part one

const file = document.getElementById("file");

if (file) {
  const previewContainer = document.getElementById("preview");
  const previewImage = previewContainer.querySelector(".imagePreview");
    file.addEventListener("change", function () {
        const img = this.files[0];
        if (img) {
            const reader = new FileReader();

            previewContainer.style.display = "block";

            reader.addEventListener("load", function () {
                previewImage.setAttribute("src", this.result);
                //console.log(this.result)
            });

            reader.readAsDataURL(img);
        } else {
            previewContainer.style.display = "none";
            previewImage.setAttribute("src", "");
        }
    });
}
