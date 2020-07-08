document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('back').addEventListener('click', function () {
        window.history.back();
    });
    document.getElementById('forward').addEventListener('click', function () {
        window.history.forward();
    })
});