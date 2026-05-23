function recaptcha() {
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('.form');
        if (!form) return;

        if (typeof levmRecaptcha === 'undefined') return;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            grecaptcha.ready(function () {
                grecaptcha
                    .execute(levmRecaptcha.siteKey, { action: 'contact' })
                    .then(function (token) {
                        document.getElementById('recaptcha_token').value = token;
                        form.submit();
                    });
            });
        });
    });
}
recaptcha();
