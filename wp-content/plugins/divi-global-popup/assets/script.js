// function showDiviPopup() {
//     const popup = document.getElementById('divi-global-popup');
//     if (popup) {
//       popup.style.display = 'flex'; // Assuming flex layout
//       setTimeout(() => popup.classList.add('show'), 10); // Trigger CSS animation
//     }
//   }

//   function hideDiviPopup() {
//     const popup = document.getElementById('divi-global-popup');
//     if (popup) {
//       popup.classList.remove('show');
//       setTimeout(() => popup.style.display = 'none', 300); // Wait for animation
//     }
//   }

//   document.addEventListener('DOMContentLoaded', function () {
//     const popup = document.getElementById('divi-global-popup');

//     // Auto-show popup after 10 seconds on first visit
//     if (!sessionStorage.getItem('diviPopupShown')) {
//       setTimeout(() => {
//         showDiviPopup();
//         sessionStorage.setItem('diviPopupShown', 'true');
//       }, 10000);
//     }

//     // Close button
//     const closeBtn = document.querySelector('.close-button');
//     if (closeBtn) {
//       closeBtn.addEventListener('click', hideDiviPopup);
//     }

//     // Open popup via button
//     const triggerButtons = document.querySelectorAll('.popup-contact-modal-divi');
//     triggerButtons.forEach(button => {
//       button.addEventListener('click', function (e) {
//         e.preventDefault(); // Prevent page refresh (important for <a href="#">)
//         showDiviPopup();
//       });
//     });
//   });

// function showDiviPopup() {
//   const popup = document.getElementById('divi-global-popup');
//   if (popup) {
//     popup.style.display = 'flex'; // Use flex layout
//     setTimeout(() => popup.classList.add('show'), 10); // Trigger CSS animation
//   }
// }

// function hideDiviPopup() {
//   const popup = document.getElementById('divi-global-popup');
//   if (popup) {
//     popup.classList.remove('show');
//     setTimeout(() => popup.style.display = 'none', 300); // Wait for animation
//   }
// }

// document.addEventListener('DOMContentLoaded', function () {
//   const popup = document.getElementById('divi-global-popup');

//   // Track visits in sessionStorage
//   let visitCount = sessionStorage.getItem('diviPopupVisitCount') || 0;
//   visitCount = parseInt(visitCount) + 1;
//   sessionStorage.setItem('diviPopupVisitCount', visitCount);

//   // Delay = visitCount * 10 seconds
//   let popupDelay = visitCount * 10000;
//   let popupTimer;

//   // Set popup timer
//   popupTimer = setTimeout(() => {
//     showDiviPopup();
//     sessionStorage.setItem('diviPopupShown', 'true');
//   }, popupDelay);

//   // If user tries to leave before popup shows → show immediately
//   window.addEventListener('beforeunload', function () {
//     if (!sessionStorage.getItem('diviPopupShown')) {
//       clearTimeout(popupTimer);
//       showDiviPopup();
//       sessionStorage.setItem('diviPopupShown', 'true');
//     }
//   });

//   // Close button
//   const closeBtn = document.querySelector('.close-button');
//   if (closeBtn) {
//     closeBtn.addEventListener('click', hideDiviPopup);
//   }

//   // Open popup via button
//   const triggerButtons = document.querySelectorAll('.popup-contact-modal-divi');
//   triggerButtons.forEach(button => {
//     button.addEventListener('click', function (e) {
//       e.preventDefault(); // Prevent page refresh
//       showDiviPopup();
//     });
//   });
// });



// function showDiviPopup() {
//   const popup = document.getElementById('divi-global-popup');
//   if (popup) {
//     popup.style.display = 'flex'; // Flex layout
//     setTimeout(() => popup.classList.add('show'), 10); // Trigger CSS animation
//   }
// }

// function hideDiviPopup() {
//   const popup = document.getElementById('divi-global-popup');
//   if (popup) {
//     popup.classList.remove('show');
//     setTimeout(() => popup.style.display = 'none', 300); // Wait for animation
//   }
// }

// document.addEventListener('DOMContentLoaded', function () {
//   const popup = document.getElementById('divi-global-popup');

//   // Track visits in sessionStorage
//   let visitCount = sessionStorage.getItem('diviPopupVisitCount') || 0;
//   visitCount = parseInt(visitCount) + 1;
//   sessionStorage.setItem('diviPopupVisitCount', visitCount);

//   // Delay = visitCount * 10 seconds
//   let popupDelay = visitCount * 10000;
//   let popupTimer;

//   // Normal popup timer
//   popupTimer = setTimeout(() => {
//     showDiviPopup();
//     sessionStorage.setItem('diviPopupShown', 'true');
//   }, popupDelay);

//   // Detect when user moves mouse towards browser tab (exit intent)
//   document.addEventListener('mouseleave', function (e) {
//     if (
//       !sessionStorage.getItem('diviPopupShown') && // Not already shown
//       e.clientY <= 0 // Cursor went above the page (towards tab area)
//     ) {
//       clearTimeout(popupTimer);
//       showDiviPopup();
//       sessionStorage.setItem('diviPopupShown', 'true');
//     }
//   });

//   // Close button
//   const closeBtn = document.querySelector('.close-button');
//   if (closeBtn) {
//     closeBtn.addEventListener('click', hideDiviPopup);
//   }

//   // Manual trigger buttons
//   const triggerButtons = document.querySelectorAll('.popup-contact-modal-divi');
//   triggerButtons.forEach(button => {
//     button.addEventListener('click', function (e) {
//       e.preventDefault();
//       showDiviPopup();
//     });
//   });
// });
function showDiviPopup() {
  const popup = document.getElementById('divi-global-popup');
  if (popup) {
    popup.style.display = 'flex'; // Flex layout
    setTimeout(() => popup.classList.add('show'), 20); // Trigger CSS animation
  }
}

function hideDiviPopup() {
  const popup = document.getElementById('divi-global-popup');
  if (popup) {
    popup.classList.remove('show');
    setTimeout(() => popup.style.display = 'none', 300); // Wait for animation
  }
}

document.addEventListener('DOMContentLoaded', function () {
  const popup = document.getElementById('divi-global-popup');

  // Track visits in sessionStorage
  let visitCount = sessionStorage.getItem('diviPopupVisitCount') || 0;
  visitCount = parseInt(visitCount) + 1;
  sessionStorage.setItem('diviPopupVisitCount', visitCount);

  // Delay = visitCount * 10 seconds
  let popupDelay = visitCount * 10000;
  let popupTimer;
  let popupShown = false; // Reset each page

  // Normal popup timer
  popupTimer = setTimeout(() => {
    if (!popupShown) {
      showDiviPopup();
      popupShown = true;
    }
  }, popupDelay);

  // Exit-intent detection (user moves cursor to tab/close area)
  document.addEventListener('mouseleave', function (e) {
    if (!popupShown && e.clientY <= 0) {
      clearTimeout(popupTimer);
      showDiviPopup();
      popupShown = true;
    }
  });

  // Close button
  const closeBtn = document.querySelector('.close-button');
  if (closeBtn) {
    closeBtn.addEventListener('click', hideDiviPopup);
  }

  // Manual trigger buttons
  const triggerButtons = document.querySelectorAll('.popup-contact-modal-divi');
  triggerButtons.forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      showDiviPopup();
      popupShown = true;
    });
  });
});





