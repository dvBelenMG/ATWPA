const carts = document.querySelectorAll('.cart');
let voltCarts = [];
let matchCart = 0;
let failCount = 0;
let bloquearJuego = false;

function voltCart() {
    if (bloquearJuego) return;
    if (voltCarts.length < 2 && !this.classList.contains('volt')) {
        this.classList.add('volt');
        voltCarts.push(this);

        if (voltCarts.length === 2) {
            checkMatch();
        }
    }
}

function checkMatch() {
    const [card1, card2] = voltCarts;

    if (card1.dataset.card === card2.dataset.card) {
        matchCart += 2;

        const overlay1 = card1.querySelector('.match-overlay');
        const overlay2 = card2.querySelector('.match-overlay');
        if (overlay1) overlay1.style.opacity = '1';
        if (overlay2) overlay2.style.opacity = '1';

        card1.removeEventListener('click', voltCart);
        card2.removeEventListener('click', voltCart);

        voltCarts = [];

        if (matchCart === carts.length) {
            document.getElementById('win-buttons').style.display = 'flex';
        }
    } else {
        const fail1 = card1.querySelector('.fail-overlay');
        const fail2 = card2.querySelector('.fail-overlay');
        if (fail1) fail1.style.opacity = '1';
        if (fail2) fail2.style.opacity = '1';

        setTimeout(() => {
            if (fail1) fail1.style.opacity = '0';
            if (fail2) fail2.style.opacity = '0';

            failCount++;

            if (failCount >= 3) {
                bloquearJuego = true;
                document.getElementById('restart-btn').style.display = 'block';
            } else {
                card1.classList.remove('volt');
                card2.classList.remove('volt');
            }

            voltCarts = [];
        }, 3000);
    }
}

function shuffleCards() {
    const cartArray = Array.from(carts);
    cartArray.forEach(cart => {
        const randomIndex = Math.floor(Math.random() * cartArray.length);
        cart.style.order = randomIndex;
    });
}

document.getElementById('restart-btn').addEventListener('click', () => {
    location.reload(); // Reinicia el juego
});
document.getElementById('play-again-btn').addEventListener('click', () => {
    location.reload();
});

carts.forEach(cart => cart.addEventListener('click', voltCart));
shuffleCards();