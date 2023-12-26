(function($){
  /* If this line runs, it means Javascript is enabled in the browser
   * so replace no-js class with js for the body tag
   */
  document.body.className = document.body.className.replace("no-js","js");

  //BANNER HOME
  document.addEventListener("DOMContentLoaded", function() {
    const bannerSection = document.getElementById("bannerSection");
    if (bannerSection) {
    const bannerImage = document.getElementById("bannerImage");
    const mainText = document.querySelector(".main-text");
  
    // Store the original source of the bannerImage
    const originalSrc = bannerImage.src;
  
    bannerSection.addEventListener("click", function() {
      // Toggle the image source between the original and the featured image
      if (bannerImage.src === originalSrc) {
        bannerImage.src = featuredImageData.featuredImageUrl;
        mainText.style.color = "#1A1F33"; // Change the text color to red (you can change this to any color you want)
      } else {
        bannerImage.src = originalSrc;
        mainText.style.color = ""; // Reset the text color
      }
    });
  }



  //MOBILE BANNERS

  const mobileBannerSection = document.querySelector(".mobile-banner-section");
  if (mobileBannerSection) {
    const mobileBannerImage = mobileBannerSection.querySelector(".img-fluid");
    const mobileMainText = mobileBannerSection.querySelector(".main-text");

    const mobileOriginalSrc = mobileBannerImage.src;
    const secondRepeaterImageURL = mobileBannerImage.getAttribute("data-second-image"); // Read the data attribute

    mobileBannerSection.addEventListener("click", function() {
      if (mobileBannerImage.src === mobileOriginalSrc) {
        mobileBannerImage.src = secondRepeaterImageURL;
        mobileMainText.style.color = "#1A1F33";
      } else {
        mobileBannerImage.src = mobileOriginalSrc;
        mobileMainText.style.color = "";
      }
    });
  }

  //MAPA INTERATIVO
  const mainDiv = document.querySelector(".img-mapa");
  if (mainDiv) {
  mainDiv.classList.add("bioma-1"); // Set "bioma-1" as the default active background
  const paths = document.querySelectorAll(".mapa-bioma");
  const circles = document.querySelectorAll("circle.mapa-bioma");
  let activeCollapse = null; // Store the currently active collapse element

  paths.forEach((pathEl, index) => {
    pathEl.addEventListener("click", () => {
      const bgClass = pathEl.getAttribute("data-bg");
      mainDiv.classList.forEach((className) => {
        if (className.startsWith("bioma-")) {
          mainDiv.classList.remove(className);
        }
      });
      mainDiv.classList.add(bgClass);
      const pathActive = document.querySelector("path.mapa-bioma.active");

      const pathElement = pathEl.tagName === "path" ? pathEl : document.querySelector("path.mapa-bioma[data-bg='" + bgClass + "']");

      if (pathActive) {
        pathActive.classList.remove("active");
      }
      pathElement.classList.add("active");
      
      // Close the currently active collapse if there is one
      if (activeCollapse) {
        const activeCard = activeCollapse.querySelector(".card");
        activeCollapse.classList.remove("show");
        activeCard.style.width = "0";
      }

      // Find the corresponding collapse element and open it
      const target = pathEl.getAttribute("data-bs-target");
      const targetDiv = document.querySelector(target);
      if (targetDiv) {
        const targetCard = targetDiv.querySelector(".card");
        targetDiv.classList.add("show");
        targetCard.style.width = "12.5rem"; // Adjust the width as needed
        activeCollapse = targetDiv; // Update the active collapse
      }

      // Update circle attributes based on the active background
      circles.forEach((circle) => {
          if (circle.getAttribute("data-bg") === bgClass) {
          circle.setAttribute("r", circle.getAttribute("data-hover-radius"));
          circle.setAttribute("opacity", circle.getAttribute("data-hover-opacity")); // Change opacity
        } else {
          console.log(circle);
          circle.setAttribute("r", circle.getAttribute("data-default-radius"));
          circle.setAttribute("opacity", circle.getAttribute("data-default-opacity")); // Reset opacity
        }
      });
  });


});

function isPathHovered() {
  return (
    Array.from(paths).some((path) => path.matches(":hover")) //||
    //Array.from(circles).some((circle) => circle.matches(":hover"))
  );
}
  // Add this section to handle clearing active background when not hovering any paths


// Add listeners for circles that don't affect the mainDiv background
circles.forEach((circle) => {
  circle.addEventListener("mouseenter", () => {
    
    const target = circle.getAttribute("data-bs-target");
    const targetDiv = document.querySelector(target);

    if (targetDiv) {
      const targetCard = targetDiv.querySelector(".card");

     
      if (!targetDiv.classList.contains("show")) {
        // Close other open divs (optional)
        const openDivs = document.querySelectorAll(".collapse.show");
        openDivs.forEach((openDiv) => {
          openDiv.classList.remove("show");
          const openCard = openDiv.querySelector(".card");
          openCard.style.width = "0";
        });

        // Open the div on hover
        targetDiv.classList.add("show");
        targetCard.style.width = "12.5rem"; // Adjust the width as needed
        activeCollapse = targetDiv; // Update the active collapse
      }
    }
  });
})
  }

//MANDALA

  const mandalaDiv = document.querySelector(".mandala-wrapper");
  if (mandalaDiv) {
  // Set your desired default background class here
  mandalaDiv.classList.add("bg1"); 

  const paths = document.querySelectorAll(".mandala-circle");
  paths.forEach((pathEl) => {
    pathEl.addEventListener("click", () => {
      mandalaDiv.classList.forEach((className) => {
        if (className.startsWith("bg")) {
          mandalaDiv.classList.remove(className);
        }
      });
      const activeOld = document.querySelector(".mandala-circle.active");
      if (activeOld) {
        activeOld.classList.remove("active");
      }
      pathEl.classList.add("active");
      const bgClass = pathEl.getAttribute("data-bg");
      mandalaDiv.classList.add(bgClass);
    });
  });

  // Set your desired default background class here
  mandalaDiv.classList.add("bg1"); 
}



//MISSÃO

  const collapseMissao = document.querySelector("#collapseMissao");
  const collapseVisao = document.querySelector("#collapseVisao");
  const missaoBtn = document.querySelector(".missao-btn .btn:nth-child(1)");
  const visaoBtn = document.querySelector(".missao-btn .btn:nth-child(2)");
  const missaoWrapper = document.querySelector(".missao-wrapper");
  if (collapseMissao && collapseVisao && missaoBtn && visaoBtn && missaoWrapper) {

  missaoBtn.addEventListener("click", function() {
    collapseMissao.classList.add("show");
    collapseVisao.classList.remove("show");
    missaoWrapper.style.maxWidth = "200%";
    missaoBtn.classList.add("active"); // Add the 'active' class to the clicked button
    visaoBtn.classList.remove("active"); // Remove the 'active' class from the other button
  });

  visaoBtn.addEventListener("click", function() {
    collapseMissao.classList.remove("show");
    collapseVisao.classList.add("show");
    missaoWrapper.style.maxWidth = "200%";
    visaoBtn.classList.add("active"); // Add the 'active' class to the clicked button
    missaoBtn.classList.remove("active"); // Remove the 'active' class from the other button
  });
}

//FLIP
// document.querySelectorAll('.card-back').forEach(cardBack => {
//   cardBack.addEventListener('mouseenter', function () {
//     this.closest('.flip-card').querySelector('.flip-tag').classList.add('slide-up'); // Add slide-up class to flip-tag
//   });

//   cardBack.addEventListener('mouseleave', function () {
//     this.closest('.flip-card').querySelector('.flip-tag').classList.remove('slide-up'); // Remove slide-up class from flip-tag
//   });
// });

//OBJETIVOS

  const wrapper = document.querySelector(".objetivos-wrapper");
  const objectives = document.querySelectorAll(".objetivos-blur");
  if (wrapper && objectives){
  objectives.forEach((objective) => {
      const targetClass = objective.getAttribute("data-target");

      objective.addEventListener("mouseenter", () => {
          wrapper.classList.remove("obj-1"); // Remove the default class
          wrapper.classList.remove("hovered"); // Remove the default hovered class
          wrapper.classList.add(targetClass);
          wrapper.classList.add("hovered");
      });

      objective.addEventListener("mouseleave", () => {
          wrapper.classList.remove(targetClass);
          wrapper.classList.remove("hovered");
          wrapper.classList.add("obj-1"); // Add the default class
          wrapper.classList.add("hovered"); // Add the default hovered class
      });
  });
}
});




//  Slick sliders
// ----------------------------------------------------------------------------

class SlickCarousel {
  constructor() {
    this.initiateCarousel();
  }

   initiateCarousel() {
 // Check if the carousel elements exist before initializing
 if ($('.carousel-slick').length && $('.nav-pills').length) {
    $('.carousel-slick').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.nav-pills'
    });
    $('.nav-pills').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.carousel-slick',
      dots: false,
      centerMode: true,
      focusOnSelect: true,
      prevArrow:"<img class='a-left control-c prev slick-prev' src='"+ themeBaseUrl + "/assets/images/Leftchevron.svg'>",
      nextArrow:"<img class='a-right control-c next slick-next' src='"+ themeBaseUrl + "/assets/images/Rightchevron.svg'>"
    });
  }
// Check if the cards-mobile element exists before initializing
if ($('.mobile-slick').length) {
    $('.mobile-slick').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: '60px',
      arrows: false,
      responsive: [
        {
          breakpoint: 460, // Adjust this breakpoint as needed
          settings: {
            centerMode: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '0', // Remove center padding on small screens
            variableWidth: false // Disable variable width on small screens
          }
        }
      ]
    });
  }

  if ($('.posts-mobile-home').length) {
    $('.posts-mobile-home').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: '60px',
      arrows: false,
      responsive: [
        {
          breakpoint: 460, // Adjust this breakpoint as needed
          settings: {
            centerMode: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '0', // Remove center padding on small screens
            variableWidth: false // Disable variable width on small screens
          }
        }
      ]
    });
  }

  if ($('.parceiros-slick').length) {
    $('.parceiros-slick').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: '60px',
      arrows: false
    });
  }

  }
}

new SlickCarousel();

})(jQuery);


