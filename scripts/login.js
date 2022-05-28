
function verifica(event){
    if(form.password.value.length == 0 && form.username.value.length == 0){
        alert("Errore campi vuoti");
        event.preventDefault();

    }   

    else if(form.username.value.length == 0 ){
        alert("Inserisci Username");
        event.preventDefault();

    }   
    else if(form.password.value.length == 0){
        alert("Inserisci Password");
        event.preventDefault();

    }    
    else if(form.password.value.length < 3 && form.username.value.length < 3 ){
        alert("Errore lunghezza minima non rispettata");
        event.preventDefault();

    }   
    else if( form.username.value == '!' || form.username.value == '!' || form.username.value == '/'  ){
        alert("Non inserire caratteri speciali");
        event.preventDefault();

    }   

    

}

// Riferimento al form
const form = document.forms['form'];
// Aggiungi listener
form.addEventListener('submit', verifica);





