const togglePassword = document.getElementById('togglepw');
const toggleNewPw = document.getElementById('toggleNew');
const inputPassword = document.getElementById('password');
const inputNewPw = document.getElementById('newPw');



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

toggleNewPw.addEventListener('click', function () {
    if (inputNewPw.type === 'password') {
        inputNewPw.type = 'text'
        toggleNewPw.classList.remove('fa-eye-slash')
        toggleNewPw.classList.add('fa-eye')
    } else {
        inputNewPw.type = 'password';
        toggleNewPw.classList.remove('fa-eye')
        toggleNewPw.classList.add('fa-eye-slash')
    }

})