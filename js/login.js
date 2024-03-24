const daftarBtn = document.getElementById('daftarBtn');
const card1 = document.querySelector('.card1');
const card2 = document.querySelector('.card2');

daftarBtn.addEventListener('click', function () {
    card1.style.display = 'none';
    card2.style.display = 'flex';
});
console.error();