#!/bin/bash

# Loop para generar los archivos
for ((i=1; i<=34; i++))
do
  # Formatea el número de archivo para que tenga dos dígitos
  num=$(printf "%02d" $i)
  
  # Crea el archivo con el nombre deseado
  filename="Ejercicio_$num.php"
  touch "$filename"
  
  # Agrega el contenido PHP al archivo
  echo '<?php' > "$filename"
  echo '  // Tu código PHP aquí' >> "$filename"
  echo '?>' >> "$filename"
done

echo "Se han creado los archivos Ejercicio_01.php a Ejercicio_34.php"

# Dar permisos antes de ejecutar con el comando: chmod +x files-generator.sh
