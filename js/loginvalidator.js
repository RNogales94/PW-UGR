
function validateLogin() {
    var username;
    var password;
    var message;
    // Get the value of the input field with id="numb"
    username = document.getElementById("usernameInput").value;
    password = document.getElementById("passwordInput").value;

    // If x is Not a Number or less than one or greater than 10
    if (!username.match(/^[0-9a-z]+$/)){
      alert('Nombre de usuario no valido');
      return false;
    }
    if (password.length < 4){
      alert('La contraseña debe tener al menos 4 caracteres');
      return false;
    }


    return true;

}
