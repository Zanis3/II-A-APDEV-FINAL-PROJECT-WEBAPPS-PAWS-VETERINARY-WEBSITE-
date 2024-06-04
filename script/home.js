document.addEventListener('DOMContentLoaded', function() {
    let currentIndex = 1;
    const articles = document.querySelectorAll('.article:not(.empty-article)');
    const dots = document.querySelectorAll('.dot');

    function updateActiveArticle() {
        articles.forEach((article, index) => {
            article.classList.remove('active');
            if (index === currentIndex - 1) {
                article.classList.add('active');
            }
        });
        dots.forEach(dot => dot.classList.remove('active'));
        dots[(currentIndex - 1) % articles.length].classList.add('active');
    }

    function showArticle(index) {
        const scrollableDiv = document.querySelector('.scrollable-div');
        const offset = (index - 1) * 33.33; // Center the active article
        scrollableDiv.style.transform = `translateX(-${offset}%)`;
        updateActiveArticle();
    }

    function nextArticle() {
        currentIndex = (currentIndex + 1) % (articles.length + 1);
        if (currentIndex === articles.length + 1) {
            currentIndex = 1;
        }
        showArticle(currentIndex);
    }

    function prevArticle() {
        currentIndex = (currentIndex - 1 + articles.length + 1) % (articles.length + 1);
        if (currentIndex === 0) {
            currentIndex = articles.length;
        }
        showArticle(currentIndex);
    }

    updateActiveArticle(); // Initialize the first active article
    window.nextArticle = nextArticle;
    window.prevArticle = prevArticle;
});