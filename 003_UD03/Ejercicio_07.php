<?php
/* Desarrolla un script que pida un nombre de usuario por POST. Al enviar el
formulario, debe establecer una cookie de modo que al cerrar el navegador y volver
a entrar en la página ésta devuelva "Hola nombre". */

// Comprueba si se ha enviado un nombre de usuario a través de POST
if (isset($_POST['username'])) {
  $username = $_POST['username'];

  // Establece una cookie con el nombre de usuario
  setcookie("username", $username, time() + 3600, '/');
  /* Explicación del método setcookie:
      La función setcookie se utiliza en PHP para establecer una cookie en el navegador del cliente. 
      La cookie es un pequeño fragmento de información que se almacena en el lado del cliente y se envía de vuelta al servidor en cada solicitud posterior. 
      Esto permite a los servidores web mantener un seguimiento del estado del cliente entre las solicitudes.

      Los parámetros de la función setcookie son los siguientes:
        1. Nombre de la cookie: Este es el nombre de la cookie que se va a establecer.
        2. Valor de la cookie: Es el valor que se asigna a la cookie. Puede ser cualquier cadena de caracteres.
        3. Tiempo de expiración: Define cuánto tiempo la cookie estará activa antes de que expire. Se especifica en segundos desde el momento actual. En el ejemplo, time() + 3600 significa que la cookie expirará en 1 hora.
        4. Ruta (path): Es la ruta dentro del servidor para la cual la cookie está disponible. "/" significa que la cookie está disponible para todo el sitio.
        5. Dominio (domain): Define el dominio para el cual la cookie es válida. Si está vacío, la cookie es válida para el dominio actual.
        6. Seguro (secure): Si se establece a true, la cookie solo se enviará a través de una conexión segura HTTPS.
        7. HTTP Only (httponly): Si se establece a true, la cookie solo se puede acceder a través de HTTP y no mediante scripts en el lado del cliente, como JavaScript.
        8. SameSite: Define las restricciones de envío de la cookie en solicitudes de navegación de terceros. Puede ser "Lax", "Strict" o estar vacío.

        En este caso, setcookie se usa para establecer una cookie llamada "username" con el valor del nombre de usuario ingresado por el usuario a través del formulario. 
        La cookie se establece con una duración de 1 hora, es válida para todo el sitio ("/"), y no se restringe a una conexión segura. 
        Después de establecer la cookie, el script redirige al usuario de vuelta al formulario "Ejercicio-7.html" para mostrar el saludo.
  */

  echo "Hola $username. Te saludo por la info del FORM del HTML. </br> Guardé tu nombre en cookies por la próxima hora. </br> Abre directamente el PHP sin pasar por el FORM para comprobarlo.";
} elseif (isset($_COOKIE['username'])) {
  // Si no se envió un nombre de usuario pero existe una cookie, obtén el nombre de usuario de la cookie
  $username = $_COOKIE['username'];

  echo "Hola $username. Te saludo desde la info de COOKIES. </br> Estaré por aquí alrededor de una hora.";
}
