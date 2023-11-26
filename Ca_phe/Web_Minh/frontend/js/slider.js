let slideIndex = 0;
showSlides();

function subSlides(n){
  if(slideIndex+=n >1){
    slideIndex=0;
    showSlides();
  }else{
    slideIndex+=n;
    showSlides();
  }
}

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}