var form = document.getElementById('restaurant-form');

form.addEventListener('submit', function (event) {
    var checkboxes = form.querySelectorAll('input[name="typologies[]"]:checked');
    if (checkboxes.length === 0) {
        // blocca il submit
        event.preventDefault();
        messageEL = document.getElementById('front-typologies-error');
        messageEL.innerHTML = '<em>Il campo typologies è obbligatorio.</em>'
    }
});