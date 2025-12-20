import './bootstrap';

let items = document.querySelectorAll(
    "#accordion-visi-misi .accordion-item .accordion-header"
);

items[0].closest(".accordion-item").classList.add("active");
items.forEach((item) => {
    item.addEventListener("click", (e) => {
        items.forEach((header) => {
            header.closest(".accordion-item").classList.remove("active");
        });

        e.currentTarget.closest(".accordion-item").classList.toggle("active");
    });
});