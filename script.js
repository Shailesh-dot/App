document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Get keyword from form
    const keyword = document.getElementById('keyword').value.toLowerCase();

    // Get the list of results and filter based on keyword
    filterResults(keyword);
});

function filterResults(keyword) {
    // Get all <li> elements in the results
    const results = document.querySelectorAll('#results ul li');

    results.forEach(result => {
        // Get the text content of each result and make it lowercase for case-insensitive comparison
        const textContent = result.textContent.toLowerCase();

        // Check if the keyword is included in the text content
        if (textContent.includes(keyword)) {
            // If it matches, display the result
            result.style.display = 'block';
        } else {
            // Otherwise, hide it
            result.style.display = 'none';
        }
    });
}

var results = document.getElementById("results");
var display = 0;

function call() {
    if (display == 1) {
        results.style.display = 'none';
        display = 0;
    } else {
        results.style.display = 'block';
        display = 1;
    }
}

results.addEventListener("click", call);
