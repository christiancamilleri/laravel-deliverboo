const formEl = document.getElementById('register-form');

formEl.addEventListener('submit', event => {
    const passwordEl = document.getElementById('password');
    const passwordConfirmEl = document.getElementById('password-confirmation');

    if (passwordEl.value != passwordConfirmEl.value) {
        // blocca il submit
        event.preventDefault();

        const messageEL = document.getElementById('password-matching-error');
        messageEL.innerHTML = '<em>Le password non coincidono, riprova.</em>'
    }
});