# Usar una imagen base de PHP con Apache
FROM php:7.4-apache

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar los archivos de tu aplicación al contenedor
COPY . /var/www/html/

# Configurar MySQL
RUN apt-get update && apt-get install -y default-mysql-client

# Configurar variables de entorno
ENV MYSQL_DATABASE=tu_base_de_datos
ENV MYSQL_USER=tu_usuario
ENV MYSQL_PASSWORD=tu_contraseña
ENV MYSQL_ROOT_PASSWORD=tu_contraseña_root
