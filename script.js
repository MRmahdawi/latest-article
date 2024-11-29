document.addEventListener('DOMContentLoaded', function() {
    setTimeout(function() {
        var popup = document.getElementById('latest-post-popup');
        popup.style.display = 'block';
    }, 5000); // 5 ثانیه

    document.querySelector('.close-btn').onclick = function() {
        var popup = document.getElementById('latest-post-popup');
        popup.style.display = 'none';
    };

    // بستن پاپ آپ با کلیک در خارج آن
    window.onclick = function(event) {
        var popup = document.getElementById('latest-post-popup');
        if (event.target == popup) {
            popup.style.display = 'none';
        }
    };
});