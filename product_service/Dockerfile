# Usar o alpine que trabalha com o Nginx
FROM php:7.3.13-fpm-alpine3.9

# Apk é o instalador do Alpine
RUN apk add --no-cache openssl bash mysql-client nodejs npm alpine-sdk autoconf librdkafka-dev nano

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

EXPOSE 9000

# Processo principal que o container vai rodar depois de rodar todos os comandos acima
ENTRYPOINT [ "php-fpm" ]
