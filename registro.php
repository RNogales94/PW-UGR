<?php

$host_db = "localhost";
$user_db = "admin";
$pass_db = "admin";
$db_name = "PW";
$tbl_name = "users";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$buscarUsuario = "SELECT * FROM $tbl_name
WHERE username = '$_POST[username]' ";

$result = $conexion->query($buscarUsuario);

$count = mysqli_num_rows($result);

if ($count == 1) {
  echo "<br />". $_POST[username] . " ya existe." . "<br />";

  echo "<a href='formularioalta.html'>Por favor escoga otro Nombre</a>";
}
else{
  $form_pass = $_POST['password'];

  $hash = password_hash($form_pass, PASSWORD_BCRYPT);
  $insert_user = "INSERT INTO users (username, hash)
  VALUES ('$_POST[username]', '$hash')";

  if ($conexion->query($insert_user) === TRUE) {
    $buscarUsuario = "SELECT id FROM $tbl_name
    WHERE username = '$_POST[username]'";

    $result = $conexion->query($buscarUsuario);
    $user_id = $result->fetch_assoc()['id'];
    $insert_profile = "INSERT INTO profile (user_id, name, surname, email, phone, birthday, gender, address)
                      VALUES ('$user_id', '$_POST[name]', '$_POST[surname]', '$_POST[email]', '$_POST[phone]', '$_POST[birthday]', '$_POST[gender]', '$_POST[address]');";

    if ($conexion->query($insert_profile) === TRUE) {
      echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
      echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
      echo "<h5>" . "Hacer Login: " . "<a href='index.html'>Login</a>" . "</h5>";
    }
    else {
      echo $insert_profile;
      echo "Se crea el username pero no el perfil" .  "<br>" . $conexion->error;
    }

  }

  else {
    echo "Error al crear el usuario." . $query . "<br>" . $conexion->error;
  }
}
mysqli_close($conexion);
?>
