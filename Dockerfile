FROM php:7-apache

COPY ./apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./apache2/start-apache /usr/local/bin
RUN a2enmod rewrite

# Copy application source
COPY . /var/www
RUN chown -R www-data:www-data /var/www

RUN groupadd apache-www-volume -g 1000
RUN useradd apache-www-volume -u 1000 -g 1000

CMD ["apache2-foreground"]