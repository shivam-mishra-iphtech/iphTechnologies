document.addEventListener("DOMContentLoaded", function () {
    const rows = document.querySelectorAll(".row-slide");

    rows.forEach((row) => {
        // Create an inner wrapper to hold the columns
        const innerWrapper = document.createElement('div');
        innerWrapper.className = 'et_pb_column_wrapper'; // Custom class for styling
        
        // Find the original columns inside the Divi row
        const columns = Array.from(row.querySelectorAll(".et_pb_column"));
        if (columns.length === 0) return;

        // Move original columns into the new wrapper
        columns.forEach(col => {
            innerWrapper.appendChild(col);
        });
        row.appendChild(innerWrapper);
        
        // Add navigation buttons to the Divi row
        const navNext = document.createElement('div');
        navNext.className = 'nav next';
        navNext.innerHTML = '<span class="dashicons dashicons-arrow-right-alt2"></span>'; // You can use Font Awesome or a custom SVG
        row.appendChild(navNext);

        const navPrev = document.createElement('div');
        navPrev.className = 'nav prev';
        navPrev.innerHTML = '<span class="dashicons dashicons-arrow-left-alt2"></span>';
        row.appendChild(navPrev);

        // --- Core Carousel Logic (Adapted from your code) ---
        const visibleSlides = 5; // You can adjust this value
        const totalSlides = columns.length;
        let currentIndex = 0;
        let autoSlide;

        // Clone the initial visible slides to the end for a seamless loop
        for (let i = 0; i < visibleSlides && i < totalSlides; i++) {
            const clone = columns[i].cloneNode(true);
            clone.classList.add("clone");
            innerWrapper.appendChild(clone);
        }

        const allSlides = Array.from(innerWrapper.children);
        const slideWidthPercentage = 100 / visibleSlides;

        function slideTo(index) {
            innerWrapper.style.transition = "transform 0.5s ease-in-out";
            innerWrapper.style.transform = `translateX(-${index * slideWidthPercentage}%)`;
            currentIndex = index;
        }

        function nextSlide() {
            if (currentIndex >= totalSlides) {
                // If we've reached the end of the original slides, jump back to the start
                innerWrapper.style.transition = "none";
                innerWrapper.style.transform = `translateX(0%)`;
                currentIndex = 0;
                // Use setTimeout to ensure the transition is reset before the next slide animation
                setTimeout(() => slideTo(1), 20);
            } else {
                slideTo(currentIndex + 1);
            }
        }

        function prevSlide() {
            if (currentIndex <= 0) {
                // If we're at the beginning, jump to the clones at the end
                innerWrapper.style.transition = "none";
                innerWrapper.style.transform = `translateX(-${totalSlides * slideWidthPercentage}%)`;
                currentIndex = totalSlides;
                // Use setTimeout to ensure the transition is reset before the previous slide animation
                setTimeout(() => slideTo(totalSlides - 1), 20);
            } else {
                slideTo(currentIndex - 1);
            }
        }

        // --- Event Handlers ---
        navNext.addEventListener('click', nextSlide);
        navPrev.addEventListener('click', prevSlide);

        function startAutoSlide() {
            stopAutoSlide();
            autoSlide = setInterval(() => nextSlide(), 4000);
        }

        function stopAutoSlide() {
            clearInterval(autoSlide);
        }

        startAutoSlide();

        innerWrapper.addEventListener("mouseover", stopAutoSlide);
        innerWrapper.addEventListener("mouseout", startAutoSlide);

        // --- Touch/Swipe Support ---
        let startX = 0;
        innerWrapper.addEventListener("touchstart", (e) => {
            startX = e.touches[0].clientX;
            stopAutoSlide();
        });

        innerWrapper.addEventListener("touchend", (e) => {
            const diff = e.changedTouches[0].clientX - startX;
            if (Math.abs(diff) > 50) {
                diff > 0 ? prevSlide() : nextSlide();
            }
            startAutoSlide();
        });
    });
});