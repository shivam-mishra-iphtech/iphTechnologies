// function showDiviPopup() {
//     const popup = document.getElementById('divi-global-popup');
//     popup.style.display = 'flex';
//     setTimeout(() => popup.classList.add('show'), 10);
    
//     // Store in sessionStorage that popup was shown
//     sessionStorage.setItem('diviPopupShown', 'true');
// }

// function hideDiviPopup() {
//     const popup = document.getElementById('divi-global-popup');
//     popup.classList.remove('show');
//     setTimeout(() => popup.style.display = 'none', 300);
// }

// document.addEventListener('DOMContentLoaded', function() {
//     // Only show popup if it hasn't been shown in this session
//     if(!sessionStorage.getItem('diviPopupShown')) {
//         setTimeout(showDiviPopup, 1000);
//     }
    
//     // Close when clicking outside content
//     document.getElementById('divi-global-popup').addEventListener('click', function(e) {
//         if(e.target === this) {
//             hideDiviPopup();
//         }
//     });
    
//     // Escape key closes popup
//     document.addEventListener('keydown', function(e) {
//         if(e.key === 'Escape') {
//             hideDiviPopup();
//         }
//     });

//     // Initialize Bootstrap Carousel
//     const carousel = new bootstrap.Carousel(document.getElementById('testimonialCarousel'), {
//         interval: 5000,
//         ride: 'carousel'
//     });

//     // Form validation
//     const form = document.querySelector('.needs-validation');
//     if (form) {
//         form.addEventListener('submit', function(event) {
//             if (!form.checkValidity()) {
//                 event.preventDefault();
//                 event.stopPropagation();
//             }
//             form.classList.add('was-validated');
//         }, false);
//     }
// });

// // Exit intent detection
// document.addEventListener('mouseout', function(e) {
//     if (!e.relatedTarget && !sessionStorage.getItem('diviPopupShown')) {
//         showDiviPopup();
//     }
// });
function showDiviPopup() {
    const popup = document.getElementById('divi-global-popup');
    if (popup) {
        popup.style.display = 'flex';
        setTimeout(() => popup.classList.add('show'), 10);
        sessionStorage.setItem('diviPopupShown', 'true');
    }
}

function hideDiviPopup() {
    const popup = document.getElementById('divi-global-popup');
    if (popup) {
        popup.classList.remove('show');
        setTimeout(() => popup.style.display = 'none', 300);
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const popup = document.getElementById('divi-global-popup');
    const closeBtn = document.querySelector('.popup-close');

    // ✅ Show popup only once per session
    if (!sessionStorage.getItem('diviPopupShown')) {
        setTimeout(showDiviPopup, 1000);
    }

    // ✅ Only allow closing from X button
    if (closeBtn) {
        closeBtn.addEventListener('click', hideDiviPopup);
    }

    // ❌ REMOVE ESCAPE KEY BEHAVIOR
    // ❌ REMOVE BACKGROUND CLICK HANDLER
});
