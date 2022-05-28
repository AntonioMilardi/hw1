const form = document.querySelector("#cambio");
form.addEventListener("submit",search);


function search(event){
   
    event.preventDefault();
    fetch('EliminaAccount.php').then(onResponse).then(ontext);
    
}

function onResponse(response)
{
  return response.text();
}


function ontext(text)
{
    
    var result = text.localeCompare('1');
    if (result){
    alert("Account eliminato con successo");
    window.location="login.php";
    }
    else
    {
        alert("Non è stato possibile eliminare l'account");

    }
    
}