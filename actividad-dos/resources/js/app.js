import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const password_confirmation = document.getElementById('password_confirmation');
password_confirmation.onpaste = e => e.preventDefault();
password_confirmation.addEventListener("contextmenu",(e)=>e.preventDefault())