
function verif() {
    var b = true;
    var nom = document.getElementById("nom").value;
    if (nom.substr(0, 1) != nom.substr(0, 1).toUpperCase()) {
        document.getElementById('error_nom').innerHTML = 'Must Start With An Uppercase Character';
        b = false;
    }
    var prenom = document.getElementById("prenom").value;
    if (prenom.substr(0, 1) != prenom.substr(0, 1).toUpperCase()) {
        document.getElementById('error_prenom').innerHTML = 'Must Start With An Uppercase Character';
        b = false;
    }
   var mdp=document.getElementById("pass").value;
    var mdpc = document.getElementById("pass2").value;
    if (mdpc !== mdp) {
        document.getElementById('error_mdpc').innerHTML = "Password Confirmation Is Different From Original Password.";
        b = false;
    }
    var code = document.getElementById("code_postal").value;
    if (code.length !== 4||code<0)
    {
        document.getElementById('error_code').innerHTML = "Non valid Zip Code";
        b = false;
    }
    var phone=document.getElementById("phone").value;
    if (phone.length !==8 || phone<0)
    {
        document.getElementById('error_phone').innerHTML = "Non Valid Phone Number.";
        b = false;
    }
  

     console.log("b="+b);
        return b;


}

  