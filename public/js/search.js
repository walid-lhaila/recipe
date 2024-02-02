document.addEventListener("DOMContentLoaded", function() {
    var searchResults = document.getDElementById("searchResults");
    if (searchResults){
        setTimeout(function() {
            searchResults.style.display = 'none';
        },3000); 
    }
});