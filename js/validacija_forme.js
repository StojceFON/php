function validateForm() {
    if(document.getElementById('ime').value=='' || document.getElementById('ime').value.length<3)
        alert("Ime mora imati minimum tri karaktera");
    if(document.getElementById('prezime').value=='' || document.getElementById('prezime').value.length<3)
        alert("Prezime mora imati minimum tri karaktera");
    if(!document.getElementById('mail').value.indexOf('@')|| !document.getElementById('mail').value.indexOf('.') || (document.getElementById('mail').value.indexOf('.')-document.getElementById('mail').value.indexOf('@'))<=2)
        alert("Neispravan format emaila.");


}