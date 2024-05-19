//SEARCH JS
document.getElementById("search-btn").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent form submission
    var searchText = document.getElementById("txtsearch").value;
    // Perform search action with searchText
    console.log("Searching for: " + searchText);
});

