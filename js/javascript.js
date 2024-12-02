let burger = document.getElementById('burger-menu')
let nav = document.getElementById('nav')

burger.addEventListener('click', e => {
    nav.classList.toggle('show');
})
