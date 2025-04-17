document.addEventListener("DOMContentLoaded", function () {
  console.log("homepage-slider initialization started");

  const slides = document.querySelectorAll(".slide");
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");
  const homepage-slider = document.querySelector(".homepage-slider");

  // Debugging checks
  if (!slides.length) console.error("No slides found!");
  if (!prevBtn || !nextBtn) console.error("Navigation buttons missing!");

  let currentIndex = 0;
  let slideInterval;
  const slideDuration = 3000;

  function showSlide(index) {
    console.log(`Showing slide ${index}`);
    slides.forEach((slide, i) => {
      slide.style.opacity = i === index ? "1" : "0";
      slide.style.zIndex = i === index ? "1" : "0";
    });
    currentIndex = index;
  }

  function nextSlide() {
    const nextIndex = (currentIndex + 1) % slides.length;
    showSlide(nextIndex);
  }

  function prevSlide() {
    const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
    showSlide(prevIndex);
  }

  function startAutoplay() {
    stopAutoplay();
    slideInterval = setInterval(nextSlide, slideDuration);
  }

  function stopAutoplay() {
    if (slideInterval) clearInterval(slideInterval);
  }

  // Initialize homepage-slider
  function inithomepage-slider() {
    slides.forEach((slide, i) => {
      slide.style.transition = "opacity 1s ease";
      slide.style.position = "absolute";
      slide.style.width = "100%";
      slide.style.height = "100%";
      slide.style.top = "0";
      slide.style.left = "0";
      slide.style.opacity = i === 0 ? "1" : "0";
      slide.style.zIndex = i === 0 ? "1" : "0";
    });

    startAutoplay();
  }

  // Event listeners
  nextBtn.addEventListener("click", () => {
    nextSlide();
    startAutoplay();
  });

  prevBtn.addEventListener("click", () => {
    prevSlide();
    startAutoplay();
  });

  homepage-slider.addEventListener("mouseenter", stopAutoplay);
  homepage-slider.addEventListener("mouseleave", startAutoplay);

  inithomepage-slider();
  console.log("homepage-slider initialized successfully");
});
