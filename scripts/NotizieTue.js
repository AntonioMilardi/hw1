fetch('stampapreferiti.php').then(onResponse).then(onJson);


function onResponse(response)
{
    return response.json();
}

function onJson(json)
{
    
    console.log(json);
    const Padre = document.querySelector('#informazioni');
    for(doc of json){
    const container= document.createElement('div');
    // Dati
    const autore= document.createElement('h1');
    const titolo = document.createElement('p'); 
    const immagine=document.createElement('img') ;
    const aggiungi= document.createElement("button")
    aggiungi.textContent="Rimuovi dalle tue notizie"
    aggiungi.addEventListener('click',rimuovipreferiti)

    autore.textContent=doc[1];
    titolo.textContent=doc[0];  
    immagine.src=doc[2];

    container.appendChild(titolo) 
    container.appendChild(immagine)
    container.appendChild(autore)
    container.appendChild(aggiungi)

    Padre.appendChild(container)

    }
}

function rimuovipreferiti(event)
{
  const bottone= event.currentTarget;
  const div= bottone.parentNode;
  console.log(div);
  const titolo= div.querySelector("p").textContent;
  const querytitolo = encodeURIComponent(titolo);
  fetch("rimuovipreferiti.php?q="+querytitolo).then(onResponseText).then(onText);
  div.innerHTML='';
  div.style.backgroundColor = "bisque";
  bottone.classList.add("hidden");
}

function onResponseText(response)
{
  return response.text();
}
function onText(text)
{
  console.log(text);
}
