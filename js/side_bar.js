
// **** FILTER PANEL SETUP ****
/* Set the width of the filter panel to 250px (show it) */
function openNav() {
  document.getElementById("myFilterpanel").style.width = "300px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("myFilterpanel").style.width = "0";
}

// Change hamburger bars to cross on click
let changeIcon = function(icon) {
  icon.classList.toggle('fa-xmark')
}

changeIcon = (icon) => icon.classList.toggle('fa-xmark')
