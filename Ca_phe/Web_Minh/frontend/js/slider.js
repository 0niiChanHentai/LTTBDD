let slideIndex = 0;
let i=0;

let slides = document.getElementsByClassName("mySlides"); 

function autoSlides() {
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(autoSlides, 5000); // Change image every 2 seconds
}

autoSlides();
