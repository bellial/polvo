(function($){
  /* If this line runs, it means Javascript is enabled in the browser
   * so replace no-js class with js for the body tag
   */
  document.body.className = document.body.className.replace("no-js","js");

  
  document.addEventListener("DOMContentLoaded", function() {

//BANNER HOME
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
    // Get the slide index to navigate to
    const slideIndex = pathEl.getAttribute("data-bs-slide-to");

    // Trigger the carousel to slide to the corresponding slide
    $('#carouselMapaMobile').carousel(parseInt(slideIndex));


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
     // Find the corresponding slide and change it
     const slideId = pathEl.getAttribute("data-slide-id");
     const slide = document.getElementById(slideId);

     if (slide) {
       const carousel = new bootstrap.Carousel(document.getElementById("carouselMapaMobile"));
       carousel.to(slideId);
     }
 });
// Function to update the background and active paths
function updateBackgroundAndPaths(activeSlideId) {
  paths.forEach((pathEl) => {
    const bgClass = pathEl.getAttribute("data-bg");
    const target = pathEl.getAttribute("data-bs-target");

    // Check if the target matches the active slide's ID
    if (target === `#${activeSlideId}`) {
      mainDiv.classList.forEach((className) => {
        if (className.startsWith("bioma-")) {
          mainDiv.classList.remove(className);
        }
      });
      mainDiv.classList.add(bgClass);

      // Update active paths
      const pathActive = document.querySelector("path.mapa-bioma.active");
      const pathElement = pathEl.tagName === "path" ? pathEl : document.querySelector(`path.mapa-bioma[data-bg='${bgClass}']`);

      if (pathActive) {
        pathActive.classList.remove("active");
      }
      pathElement.classList.add("active");

      // Update circle attributes based on the active background
      circles.forEach((circle) => {
        if (circle.getAttribute("data-bg") === bgClass) {
          circle.setAttribute("r", circle.getAttribute("data-hover-radius"));
          circle.setAttribute("opacity", circle.getAttribute("data-hover-opacity")); // Change opacity
        } else {
          circle.setAttribute("r", circle.getAttribute("data-default-radius"));
          circle.setAttribute("opacity", circle.getAttribute("data-default-opacity")); // Reset opacity
        }
      });
    } else {
      // If the target doesn't match the active slide's ID, deactivate the path
      const pathElement = pathEl.tagName === "path" ? pathEl : document.querySelector(`path.mapa-bioma[data-bg='${bgClass}']`);
      pathElement.classList.remove("active");
    }
  });
}
        //Add a listener to the Bootstrap Carousel slide event
        document.getElementById("carouselMapaMobile").addEventListener("slide.bs.carousel", function (e) {
            const activeSlideId = e.relatedTarget.id;
            updateBackgroundAndPaths(activeSlideId);
        });
        
        // Add a listener for the Bootstrap Carousel button clicks
        const carouselPrevButton = document.querySelector(".carousel-control-prev");
        const carouselNextButton = document.querySelector(".carousel-control-next");
        
        carouselPrevButton.addEventListener("click", () => {
            const activeSlide = document.querySelector(".carousel-item.active");
            if (activeSlide.previousElementSibling) {
                const activeSlideId = activeSlide.previousElementSibling.id;
                updateBackgroundAndPaths(activeSlideId);
            }
        });
        
        carouselNextButton.addEventListener("click", () => {
            const activeSlide = document.querySelector(".carousel-item.active");
            if (activeSlide.nextElementSibling) {
                const activeSlideId = activeSlide.nextElementSibling.id;
                updateBackgroundAndPaths(activeSlideId);
            }
        });
});

function isPathHovered() {
 return (
   Array.from(paths).some((path) => path.matches(":hover")) 
 );
}

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
  // Check if this is the default background element (data-bg="bg1")
    const isDefaultBg = pathEl.getAttribute("data-bg") === "bg1";

    // Add the 'active' class for the default background
    if (isDefaultBg) {
      pathEl.classList.add("active");
    }
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
let activeObjective = null; // Track the active objective

// Function to update the background based on the active slide
const updateBackground = () => {
    const activeSlide = $(".objetivos-row").slick("slickCurrentSlide");
    const activeTarget = objectives[activeSlide].getAttribute("data-target");

    wrapper.classList.remove("obj-1", "obj-2", "obj-3", "obj-4");
    wrapper.classList.add(activeTarget);
};

// Function to add the hovered class
const addHoveredClass = () => {
    wrapper.classList.add("hovered");
};

// Set the default active class (obj-1) when the page loads
wrapper.classList.add("obj-1");

// Desktop functionality
if (wrapper && objectives) {
    objectives.forEach((objective, index) => {
        const targetClass = objective.getAttribute("data-target");

        // Function to apply the hover and click logic
        const applyHoverEffect = () => {
            if (activeObjective !== null) {
                activeObjective.classList.remove("active"); // Remove active class from the previous active element
            }
            activeObjective = objective; // Set the current element as the active one
            objective.classList.add("active"); // Add active class to the clicked element

             // Remove all classes starting with "obj-"
            wrapper.classList.remove("obj-1", "obj-2", "obj-3", "obj-4");
            wrapper.classList.add(targetClass);
        };

        // Add mouseover event
        objective.addEventListener("mouseenter", () => {
            applyHoverEffect();
            addHoveredClass();
        });

        // Add click event
        objective.addEventListener("click", () => {
            applyHoverEffect();
            addHoveredClass();
        });

        // Only the first element gets the "active" class by default
        if (index === 0) {
            applyHoverEffect();
        }
    });
}



// $(".read-more").click(function () {
//   // Find the closest card and toggle the class within that card
//   var card = $(this).closest('.card');
//   card.find('.mobile-content').toggleClass("expanded");
//   card.find(".read-more").hide();
//   card.find(".read-less").show();
//   card.find(".full-content").slideDown();
//   card.find(".truncated-content").hide();
//   // Check if the screen width is less than 991 pixels (mobile)
//   if (window.innerWidth < 991) {
//     card.find('.gestoras').css("height", "auto");
//   }
// });

// $(".read-less").click(function () {
//   // Find the closest card and toggle the class within that card
//   var card = $(this).closest('.card');
//   card.find('.mobile-content').toggleClass("expanded");
//   card.find(".read-more").show();
//   card.find(".read-less").hide();
//   card.find(".full-content").slideUp();
//   card.find(".truncated-content").show();
//   // Check if the screen width is less than 991 pixels (mobile)
//   if (window.innerWidth < 991) {
//     card.find('.gestoras').css("height", ""); // Reset height to auto
//   }
// });

//SOBRE

 // Open "sobre-card" by default
 $('#collapse-0').show();
 $('#collapse-0').css('opacity', 1);

 // Hide extra slider-cards sections by default
 $('[id^="slider-cards-"]').not('#slider-cards-0').hide();

 // Handle click events on anchor tags
 $('.toggle-card').on('click', function(e) {
   e.preventDefault();

   var targetId = $(this).attr('href');
   var $target = $(targetId);

   // Check if the target is already visible
   if ($target.is(':visible')) {
     return;
   }

  // Function to toggle between cards
function toggleCard(targetId) {
  var $target = $(targetId);

  // Hide all cards except the target
  $('.custom-collapse').not($target).hide();
  
  // Fade out the currently visible card
  $('.custom-collapse:visible').css('opacity', 0);

  // Trigger the slide animation for bolinha-azul elements
  $target.find('.bolinha-azul').css('animation', 'slideFromBottomToTop 0.35s ease forwards');
  $target.find('.bolinha-azul-quem-faz').css('animation', 'slideFromTopToBottom 0.35s ease forwards');
}
   // Wait for the fade-out transition to complete before hiding the card
   setTimeout(function() {
     $('.custom-collapse:visible').hide();
     
     // Show the clicked card and fade it in
     $target.show();
     setTimeout(function() {
       $target.css('opacity', 1);
     }, 10); // Delay the opacity change for smooth transition
   }, 350); // Use the same duration as the CSS transition
 });

// CONTROLE CARROSSEL
var carousel = $('#banner-carrossel');
var navCarousel = $('.controles .carousel-inner');

carousel.on('slide.bs.carousel', function (event) {
    var activeIndex = event.to;
    navCarousel.find('.carousel-item').removeClass('active');
    navCarousel.find('.carousel-item[data-bs-slide-to="' + activeIndex + '"]').addClass('active');

    // Hide all slider-cards sections except the corresponding one
    $('[id^="slider-cards-"]').not('#slider-cards-' + activeIndex).hide();
    $('#slider-cards-' + activeIndex).show();

    // Show the first card of the selected slider-cards section
    $('#slider-cards-' + activeIndex + ' [id^="card-"]').not('#card-' + activeIndex + '-0').hide();
    $('#card-' + activeIndex + '-0').show();

    
});

var cardWidth = $(".nav-item.carousel-item").width();
var numCards = $(".nav-item.carousel-item").length;
var visibleCards = 1; // Number of visible cards at a time
var scrollPosition = 0;

$(".carousel-control-next").on("click", function () {
    scrollPosition += cardWidth;
    
    // Check if we've reached the end
    if (scrollPosition > (numCards - visibleCards) * cardWidth) {
        scrollPosition = 0; // Wrap around to the beginning
    }
    
    navCarousel.animate({ scrollLeft: scrollPosition }, 600);
});

$(".carousel-control-prev").on("click", function () {
    scrollPosition -= cardWidth;
    
    // Check if we've reached the beginning
    if (scrollPosition < 0) {
        scrollPosition = (numCards - visibleCards) * cardWidth; // Wrap around to the end
    }
    
    navCarousel.animate({ scrollLeft: scrollPosition }, 600);
});



//SLIDER CARDS
 $('.nav-link').click(function () {
  $('.nav-item').removeClass('active'); // Remove 'active' class from all nav-items
  $(this).closest('.nav-item').addClass('active'); // Add 'active' class to the clicked nav-item
});


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
      centerPadding: '10px',
      arrows: false,
    });
  }

  if ($('.posts-mobile-home').length) {
    $('.posts-mobile-home').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: '0',
      arrows: false
    });
  }

  if ($('.parceiros-slick').length) {
    $('.parceiros-slick').slick({
      dots: true,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: '30px',
      arrows: false
    });
  }

  if ($('.resultados-slick').length) {
    $('.resultados-slick').slick({
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      centerPadding: '0',
      arrows: true,
      prevArrow:"<img class='position-absolute top-50 start-0 slick-prev' src='"+ themeBaseUrl + "/assets/images/result-left.svg'>",
      nextArrow:"<img class='position-absolute top-50 end-0 slick-next' src='"+ themeBaseUrl + "/assets/images/result-right.svg'>"
    });
  }

  if ($('.mandala-slick').length) {
    const mandalaDiv = document.querySelector(".mandala-wrapper");
  const paths = document.querySelectorAll(".mandala-circle");
  $('.mandala-slick').slick({
    infinite: true,
    speed: 500,
    fade: true,
    centerMode: true,
    cssEase: 'linear',
    prevArrow:"<img class='a-left control-c prev slick-prev' src='"+ themeBaseUrl + "/assets/images/mandala-left.svg'>",
    nextArrow:"<img class='a-right control-c next slick-next' src='"+ themeBaseUrl + "/assets/images/mandala-right.svg'>"

  });
  // Add a click event listener to the previous arrow
  $('.slick-prev').click(function() {
    changeBackground('prev');
  });
  // Add a click event listener to the next arrow
  $('.slick-next').click(function() {
    changeBackground('next');
  });

  // Add a touch event listener to the slider
  $('.mandala-slick').on('swipe', function(event, slick, direction) {
    if (direction === 'left') {
      changeBackground('next');
    } else if (direction === 'right') {
      changeBackground('prev');
    }
  });
  
  function changeBackground(direction) {
    // Get the active path
    const activePath = document.querySelector(".mandala-circle.active");
    if (activePath) {
      activePath.classList.remove("active");
    }

    // Calculate the index of the new active path based on the direction
    let newIndex;
    if (direction === 'prev') {
      newIndex = (activePath ? Array.from(paths).indexOf(activePath) : -1) - 1;
      if (newIndex < 0) {
        newIndex = paths.length - 1;
      }
    } else if (direction === 'next') {
      newIndex = (activePath ? Array.from(paths).indexOf(activePath) : -1) + 1;
      if (newIndex >= paths.length) {
        newIndex = 0;
      }
    }

    // Set the new active path
    const newActivePath = paths[newIndex];
    newActivePath.classList.add("active");
    const bgClass = newActivePath.getAttribute("data-bg");
    
    // Remove existing background classes
    mandalaDiv.classList.forEach((className) => {
      if (className.startsWith("bg")) {
        mandalaDiv.classList.remove(className);
      }
    });
    
    // Add the new background class
    mandalaDiv.classList.add(bgClass);
  }
}

if ($(window).width() < 991) {
  if ($('.flip-row').length) {
  $('.flip-row').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    infinite: true,
    speed: 300,
    centerMode: true,
    centerPadding: '40px',
    arrows: false
  });
}

}

  }
}

new SlickCarousel();
// Define a class for handling the OBJETIVOS slider
class ObjetivosSlider {
  constructor() {
      this.wrapper = document.querySelector(".objetivos-wrapper");
      this.objectives = document.querySelectorAll(".objetivos-blur");
      
      // Initialize the OBJETIVOS slider
      if ($(window).width() < 991) {
      if ($('.objetivos-row').length) {
          $('.objetivos-row').slick({
              slidesToShow: 1,
              slidesToScroll: 1,
              dots: false,
              infinite: true,
              speed: 300,
              centerMode: true,
              centerPadding: '0',
              prevArrow: "<img class='position-absolute top-100 start-20 w-auto slick-prev' src='" + themeBaseUrl + "/assets/images/obj-left.svg'>",
              nextArrow: "<img class='position-absolute top-100 w-auto end-20 slick-next' src='" + themeBaseUrl + "/assets/images/obj-right.svg'>"
          });
          
          // Add an event listener for after the slide changes in the OBJETIVOS slider
          $('.objetivos-row').on('afterChange', this.updateBackground.bind(this));
      }
    }
  }

  // Function to update the background based on the active slide
  updateBackground(event, slick, currentSlide) {
      const activeTarget = this.objectives[currentSlide].getAttribute("data-target");

      this.wrapper.classList.remove("obj-1", "obj-2", "obj-3", "obj-4");
      this.wrapper.classList.remove("hovered");
      this.wrapper.classList.add(activeTarget);
      this.wrapper.classList.add("hovered");
  }
}

// In your main code block
document.addEventListener("DOMContentLoaded", function() {
  // ... Other code ...

  // Create an instance of ObjetivosSlider to handle the OBJETIVOS slider
  const objetivosSlider = new ObjetivosSlider();
});


})(jQuery);


