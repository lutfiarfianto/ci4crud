

window.onscroll = function() {
  videoStickyFunct();
};

// Get the header
var header = document.getElementById("video-sticky");
var afterVid = document.getElementById("after-video");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function videoStickyFunct() {

  if(window.innerWidth<=756){
    
    if (window.pageYOffset > sticky) {
      header.classList.add("video-fix");
      header_h = header.offsetHeight - 40;
      afterVid.style.paddingTop = header_h + "px";
      
    } else {
      header.classList.remove("video-fix");
      afterVid.style.paddingTop = 0;
    }

  }

}

