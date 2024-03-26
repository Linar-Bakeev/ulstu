document.addEventListener('DOMContentLoaded', function () {
    // Отображение уведомления при загрузке страницы, если есть параметр success в URL
    if (window.location.search.includes('success')) {
        showNotification();
    }
});

function showNotification() {
    var notification = document.getElementById('notification');
    notification.classList.add('show');
}
