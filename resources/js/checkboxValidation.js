const formEl = document.getElementById('restaurant-form');

formEl.addEventListener('submit', event => {
    const checkboxesEl = form.querySelectorAll('input[name="typologies[]"]:checked');

    if (checkboxesEl.length === 0) {
        // blocca il submit
        event.preventDefault();

        const messageEL = document.getElementById('front-typologies-error');
        messageEL.innerHTML = '<em>Il campo typologies è obbligatorio.</em>'
    }
});