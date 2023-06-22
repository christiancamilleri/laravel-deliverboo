const formEl = document.getElementById('restaurant-form');

formEl.addEventListener('submit', event => {
    const checkboxesEl = document.querySelectorAll('input[name="typologies[]"]:checked');

    if (checkboxesEl.length === 0) {
        event.preventDefault();
        // blocca il submit

        const messageEL = document.getElementById('front-typologies-error');
        messageEL.innerHTML = '<em>Il campo typologies è obbligatorio.</em>'
    }
});