import './bootstrap';

// Header Menu Mobile
let menus = document.querySelectorAll(
    "#mobile-menu .mobile-menu-item.dropdown"
);

menus.forEach((menu) => {
    menu.addEventListener("click", (e) => {
        e.currentTarget.closest(".mobile-menu-item").classList.toggle('show');
    })
})