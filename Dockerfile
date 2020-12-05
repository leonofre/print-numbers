FROM php:7-apache

COPY ./apache2/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./apache2/start-apache /usr/local/bin
RUN a2enmod rewrite

# Copy application source
COPY . /var/www
RUN chown -R www-data:www-data /var/www

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git


RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

RUN groupadd apache-www-volume -g 1000
RUN useradd apache-www-volume -u 1000 -g 1000
RUN composer update

CMD ["apache2-foreground"]