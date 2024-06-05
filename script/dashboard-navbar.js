function showContent(page) {
    const content = document.getElementById('content');
    if (page === 'doctor') {
        content.innerHTML = '<h2>Doctor Page</h2><p>Content for the Doctor page.</p>';
    } else if (page === 'reports') {
        content.innerHTML = '<h2>Reports Page</h2><p>Content for the Reports page.</p>';
    } else if (page === 'calendar') {
        content.innerHTML = '<h2>Calendar Page</h2><p>Content for the Calendar page.</p>';
    }
}