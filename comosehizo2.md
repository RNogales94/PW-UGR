# Practica 2 PW
### UGR - Rafael Nogales

## Qué hay hecho:
+ Creación de tablas de MySQL
+ Conexión de PHP y MySQL
+ Formulario de registro
+ Validación de formularios con JavaScript
+ Formulario de login
+ Migración de BD de local a remoto

## Que no hay hecho:
+ Sesiones de usuario
+ Carpeta /media/ con fotos de perfil de los usuarios
+ Creación dinámica de comentarios en foros.


#### Paso 1:
Creación de un repositorio git para el desarrollo del proyecto
#### Paso 2:
Descargar en el entorno de trabajo todas las herramientas necesarias:
(PHP 7, MySQL, Apache...)
Además de un IDE adecuado (en mi caso Atom + xdebug)
#### Paso 3:
Crear las tablas de la base de datos (en mi caso hay solo dos tablas ya que no he hecho la parte de los comentarios)
La estructura es la siguiente:

|Tabla: users  |
|------------------|
| id unsigned INT Auto Increment (PK) | username Varchar | hash Varchar(60) |
| creation_date Datetime DEFAULT currentTimeStamp |

|Tabla: profile  |
|------------------|
| id unsigned INT Auto Increment (PK) |  user_id unsigned INT (Foreign key users.id) |
| name Varchar | surname |
| email | birthday |
| phone | address |

#### Paso 4:
Para crear un usuario
se crea en primer lugar un user y a continuación se rellena un perfil asociado (mediante clave externa) en la BD.  
Todo esto se hace en el servidor con código PHP.  
Para conectarnos a la BD utilizamos el driver mysqli (el mysql está ya obsoleto) y lanzamos una consulta sql para comprobar si el usuario ya existe, si no existe lo creamos (insertandolo en la BD).

La contraseña se encripta y se guarda únicamente el hash (está prohibido guardar contraseñas).

#### Paso 5:
Validar que todo el formulario de registro esté correcto antes de enviarlo.

#### Paso 6:
Crear un login que comprueba si el usuario y la contraseña son correctos.
