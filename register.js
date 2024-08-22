document.addEventListener('DOMContentLoaded', function() {
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const repeatPassInput = document.getElementById('repeatpass');
    const emailInput = document.getElementById('email');
    const submitButton = document.getElementById('submit_button');

    [usernameInput, passwordInput, repeatPassInput, emailInput].forEach(inputField => {
        inputField.addEventListener('input', function() {
            const isNotEmpty = usernameInput.value.trim() !== '' &&
                                passwordInput.value.trim() !== '' &&
                                repeatPassInput.value.trim() !== '' &&
                                emailInput.value.trim() !== '';
            submitButton.disabled = !isNotEmpty;
        });
    });
});
