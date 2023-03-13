FROM bitnami/php-fpm:8.1

RUN apt-get update \
    && apt install software-properties-common \
    && add-apt-repository --yes ppa:ondrej/php \
    && apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.1-memcached \
    php8.1-memcache \
    php8.1-mbstring \
    php8.1-mysql \
    php8.1-xdebug \
    git \
    gettext \
    php8.1-dev libmcrypt-dev gcc make autoconf libc-dev pkg-config \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

ADD ./php.ini /etc/php/8.1/fpm/conf.d/90-php.ini
ADD ./php.ini /etc/php/8.1/cli/conf.d/90-php.ini

RUN usermod -u 1000 www-data

WORKDIR "/var/www/bitrix"

EXPOSE 9000
