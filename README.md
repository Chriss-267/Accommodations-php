# Accommodations PHP

## Descripción
Este proyecto es una plataforma de alojamiento donde los usuarios pueden seleccionar y gestionar alojamientos. Los administradores tienen acceso a funciones especiales, como crear alojamientos.

## Instrucciones para ejecutar el proyecto

1. **Descargue el proyecto** y ubíquelo en la carpeta `htdocs` de su instalación de XAMPP.

2. **Restaure la base de datos** que se encuentra en la carpeta `backup`:
   - Abra PHPMyAdmin en su navegador (generalmente `http://localhost/phpmyadmin`).
   - Seleccione la base de datos correspondiente o cree una nueva base de datos.
   - Vaya a la pestaña **Importar** y seleccione el archivo `.sql` que está en la carpeta `backup`.
   - Haga clic en el botón **Ejecutar** para restaurar la base de datos.

3. **Inicie los servicios en XAMPP**:
   - Abra el panel de control de XAMPP.
   - Inicie **Apache** y **MySQL**.

4. **Acceda al proyecto**:
   - Una vez que Apache y MySQL estén funcionando, abra su navegador web.
   - Ingrese la siguiente URL:

     ```
     http://localhost/accommodations-php/accommodations-php/login.php
     ```

5. **Credenciales para ingresar como administrador**:
   - **Correo**: `admin@example.com`
   - **Contraseña**: `password`

6. **Registrarse como usuario**:
   - Si no desea usar las credenciales de administrador, puede registrarse como usuario. Sin embargo, su rol será de **usuario**.

## Notas
- Asegúrese de que **XAMPP** esté correctamente instalado y configurado en su máquina.
- Verifique que el proyecto esté correctamente ubicado en la carpeta `htdocs` de XAMPP.
- Recuerde restaurar la base de datos desde el archivo `.sql` en la carpeta `backup`.

## Tecnologías utilizadas
- PHP
- MySQL
- XAMPP
- HTML
- TAILWIND CSS


