const btn = document.getElementById('btn');
const form = document.getElementById('form');
const closeForm = document.getElementById('closeForm');

btn.addEventListener('click', () => {
    form.classList.add("scale-100");
    form.classList.remove("scale-0");
});
closeForm.addEventListener('click', () => {
    form.classList.remove("scale-100");
    form.classList.add("scale-0");
});