document.addEventListener("DOMContentLoaded", function () {
    const newsletterSection = document.getElementById("newsletter-section");
    const overlay = document.createElement("div");
    overlay.classList.add("overlay");
  
    document.body.appendChild(overlay);
  
    let popUpShown = false;
  
  
    // Section show pas scroll ne page 
    window.addEventListener("scroll", function () {
        const scrollPosition = window.scrollY;
  
        if (scrollPosition > 1900 && !popUpShown) {
            newsletterSection.style.display = "block"; 
            newsletterSection.classList.add("pop-up");
            overlay.classList.add("show-overlay");
            popUpShown = true; 
        }
    });
  });
  
  
  // Submit Button Clicked, wait time pas klikimit 
  function submitForm() {
    
    setTimeout(closePopup, 2000);
  }
  
  
  // Buttoni Close te window 
  function closePopup() {
    const newsletterSection = document.getElementById("newsletter-section");
    const overlay = document.querySelector(".overlay");
  
    newsletterSection.style.display = "none"; 
    newsletterSection.classList.remove("pop-up");
    overlay.classList.remove("show-overlay");
  }