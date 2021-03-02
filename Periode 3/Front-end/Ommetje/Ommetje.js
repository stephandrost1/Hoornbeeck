function closePopup(x) {
    document.getElementById(x).style.display = 'none';
    // window.onscroll = function() {}; 
}

function openPopup(x) {
    // scrollTop = window.pageYOffset || document.documentElement.scrollTop; 
    // scrollLeft = window.pageXOffset || document.documentElement.scrollLeft, 
    //     window.onscroll = function() { 
    //         window.scrollTo(scrollLeft, scrollTop); 
    //     }; 
    document.getElementById(x).style.display = 'block';
}