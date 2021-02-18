# Usar o alpine que trabalha com o Nginx
FROM php:7.3.13-fpm-alpine3.9

# Apk é o instalador do Alpine
RUN apk add --no-cache openssl bash mysql-client nodejs npm alpine-sdk autoconf librdkafka-dev vim nginx openrc
RUN mkdir -p /run/nginx && \
    echo "pid /run/nginx.pid;" >> /etc/nginx/nginx.conf

# docker-php-ext-install permite instalar extensões do PHP
RUN docker-php-ext-install pdo pdo_mysql bcmath

#Instalar Biblioteca do Kafka
RUN pecl install rdkafka

#Ativar o Kafka
RUN ln -s /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini && \
    echo "extension=rdkafka.so" >> /usr/local/etc/php/php.ini

WORKDIR /var/www

RUN rm -rf /var/www/html
RUN ln -s public html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN rm /etc/nginx/conf.d/default.conf
COPY .docker/nginx/nginx.conf /etc/nginx/conf.d
COPY . .
RUN chmod -R 777 /var/www/storage/
RUN chmod -R 777 /var/www/entrypoint.sh

EXPOSE 80
ENTRYPOINT [ "/var/www/entrypoint.sh" ]
