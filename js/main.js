const togglePassword = document.getElementById('togglepw');
const inputPassword = document.getElementById('password');

togglePassword.addEventListener('click', function () {
    if (inputPassword.type === 'password') {
        inputPassword.type = 'text'
        togglePassword.classList.remove('fa-eye-slash')
        togglePassword.classList.add('fa-eye')
    } else {
        inputPassword.type = 'password';
        togglePassword.classList.remove('fa-eye')
        togglePassword.classList.add('fa-eye-slash')
    }

})