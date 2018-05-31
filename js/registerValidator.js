
function validateRegister() {
    var username, password, name, surname, phone, date;
    // Get the value of the input field with id="numb"
    username = document.getElementById("usernameInput").value;
    password = document.getElementById("passwordInput").value;
    name     = document.getElementById("nameInput").value;
    surname  = document.getElementById("surnameInput").value;
    phone    = document.getElementById("phoneInput").value;
    birthday    = document.getElementById("birthdayInput").value;

    // If x is Not a Number or less than one or greater than 10
    if (!username.match(/^[0-9a-z]+$/)){
      alert('Nombre de usuario no valido');
      return false;
    }
    if (password.length < 4){
      alert('La contraseña debe tener al menos 4 caracteres');
      return false;
    }
    if (!name.match(/^[a-z]+$/)){
      alert('El nombre contiene caracteres no permitidos');
      return false;
    }
    if (!surname.match(/^[a-z]+$/)){
      alert('El apellido contiene caracteres no permitidos');
      return false;
    }
    if (!phone.match(/^[0-9]+$/)){
      alert('El numero de telefono contiene caracteres no numericos');
      return false;
    }
    console.log(birthday);
    if (!birthday){
      alert('Debe seleccionar una fecha');
      return false;
    }


    return true;

}
