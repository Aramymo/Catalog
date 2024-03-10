document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        this.parentElement.querySelector('.dropdown-menu').classList.toggle('show');
    });
});