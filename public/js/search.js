document.addEventListener("DOMContentLoaded", function() {
    var searchResults = document.getElementById("searchResults");
    if (searchResults){
        setTimeout(function() {
            searchResults.classList.add('opacity-0');
        },200); 
    }
});