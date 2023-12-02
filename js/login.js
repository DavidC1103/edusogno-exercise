// Funzione per verificare le credenziali dell'utente
async function checkCredentials(email, password) {
    // Effettua la richiesta al file JSON
    const response = await fetch('./users.json');
    if (!response.ok) {
        // Gestisci errori nella risposta (ad esempio, reindirizza a una pagina di errore)
        console.error('Errore nella richiesta:', response.statusText);
        return;
    }
    const data = await response.json();

    // Cerca una corrispondenza nelle credenziali degli utenti
    const userMatch = data.some(user => {
        return email === user.email && password === user.password;
    });

    return userMatch;
}

// Funzione per mostrare un messaggio di errore
function displayError(message) {
    const errorDiv = document.getElementById('error-div');
    const existingErrorDiv = document.querySelector('.p-error');

    if (!existingErrorDiv) {
        const p_error = document.createElement('p');
        p_error.innerHTML = message;
        p_error.classList.add('p-error');
        errorDiv.appendChild(p_error);
    } else {
        console.log('Il messaggio di errore esiste già.');
    }
}

// Ottenere il pulsante di invio del modulo e aggiungere un gestore di eventi
const btnSub = document.getElementById('btnSub');
btnSub.addEventListener('click', async function (event) {
    // Impedisci l'invio predefinito del modulo
    event.preventDefault();

    // Recupera i valori di email e password
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Verifica le credenziali dell'utente
    const isValidCredentials = await checkCredentials(email, password);

    // Se le credenziali sono valide, invia il modulo
    if (isValidCredentials) {
        document.getElementById('login_form').submit();
    } else {
        // Se le credenziali non sono valide, mostra un messaggio di errore
        displayError('Dati errati. Controlla i dati inseriti.');
    }
});