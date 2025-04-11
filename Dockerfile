FROM php:8.2-apache

# Copia los archivos del proyecto
COPY . /var/www/html/

# Usa el puerto proporcionado por Render
ENV PORT 10000

# Reemplaza el puerto 80 en Apache por el valor de $PORT
RUN sed -i "s/80/\${PORT}/g" /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf

# Expón ese puerto
EXPOSE ${PORT}

# Comando para iniciar Apache
CMD ["apache2-foreground"]
