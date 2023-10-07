let filename
await fetch('./users.json')
    .then((res) => res.json())
    .then((data) => {
        filename = data

    })

const btnSub = document.getElementById('btnSub')


btnSub.addEventListener('click', function (event) {
    let checkData = false
    const password = document.getElementById('password').value
    const form = document.getElementById('pw_form')


    filename.forEach(user => {

        if (password !== user.password) {
            event.preventDefault()
        } else {
            checkData = true
            form.submit()
        }
    });

    if (checkData === false) {
        let p_error = document.createElement('p')
        let errorDiv = document.getElementById('error-div')

        var controllDiv = document.querySelector('.p-error')

        if (typeof (controllDiv) != 'undefined' && controllDiv != null) {
            console.log('esiste');
        } else {
            p_error.innerHTML = 'Vecchia password errata'
            p_error.classList.add('p-error')
            errorDiv.append(p_error)
        }

    }
})