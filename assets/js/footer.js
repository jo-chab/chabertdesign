
// document.addEventListener("DOMContentLoaded", function() {
//     var projectBoxes = document.querySelectorAll('.project-box');
//     var lastScrollY = window.scrollY;
//     var isScrollingDown = true;
//
//     var observer = new IntersectionObserver(function(entries, observer) {
//         entries.forEach(function(entry) {
//             if (entry.isIntersecting) {
//                 // Calculate the offset relative to the viewport
//                 var offset = entry.boundingClientRect.top + window.scrollY;
//
//                 // Scroll to the top of the intersecting project box
//                 window.scrollTo({
//                     top: offset,
//                     behavior: 'smooth'
//                 });
//
//                 // Unobserve the target to prevent multiple scrolls
//                 observer.unobserve(entry.target);
//             }
//         });
//     }, { threshold: 0.5 }); // Adjust the threshold as needed
//
//     projectBoxes.forEach(function(box) {
//         observer.observe(box);
//     });
//
//     // Detect scrolling direction
//     window.addEventListener("scroll", function() {
//         var currentScrollY = window.scrollY;
//         isScrollingDown = currentScrollY > lastScrollY;
//         lastScrollY = currentScrollY;
//     });
//
//     // Handle scrolling direction change
//     setInterval(function() {
//         var currentScrollY = window.scrollY;
//
//         // Check if scrolling direction changed
//         if ((isScrollingDown && currentScrollY <= lastScrollY) || (!isScrollingDown && currentScrollY >= lastScrollY)) {
//             // Reobserve all project boxes when scrolling direction changes
//             projectBoxes.forEach(function(box) {
//                 observer.observe(box);
//             });
//         }
//     }, 100);
// });