<?php
/* Escribe un script que devuelva la diferencia entre un número dado y 15. Si el número
dado es negativo o igual a 15, debe mostrar un texto de error. */
$CONST = 15;
$numero = 17;

$diferencia = $numero - $CONST;

if ( $diferencia == $CONST || $diferencia < 0) {
  echo ("Este sería un mensaje de error");
} else {
  echo ("Este sería un mensaje de todo correcto. Status: 200.");
}
