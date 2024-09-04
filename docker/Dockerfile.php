FROM php:8.2-apache
ARG UID
ARG GID
RUN apt-get update; apt-get install unzip git -y
RUN docker-php-ext-install mysqli pdo_mysql && a2enmod rewrite
EXPOSE 80
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ADD entrypoint-php.sh /entrypoint-php.sh
RUN chmod +x /entrypoint-php.sh
RUN groupadd -f user -g$GID
RUN adduser --disabled-password --uid $UID --gid $GID --gecos "" user || true
CMD ["/entrypoint-php.sh"]