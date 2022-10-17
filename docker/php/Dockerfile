
FROM ubuntu:22.04
LABEL Name=gameplanner Version=0.0.1

ENV PM_MAX_CHILDREN=20 \
 PM_START_SERVERS=5 \
 PM_MIN_SPARE_SERVERS=3 \
 PM_MAX_SPARE_SERVERS=10


RUN truncate -s0 /tmp/preseed.cfg; \
    echo "tzdata tzdata/Areas select Europe" >> /tmp/preseed.cfg; \
    echo "tzdata tzdata/Zones/Europe select Prague" >> /tmp/preseed.cfg; \
    debconf-set-selections /tmp/preseed.cfg && \
    rm -f /etc/timezone /etc/localtime && \
    apt-get update && \
    apt-get install -y tzdata

RUN apt-get install -y software-properties-common \
    && add-apt-repository ppa:ondrej/php && apt-get update && apt-get install \
    php8.1-fpm php8.1-common php8.1-pgsql php8.1-xml php8.1-xmlrpc php8.1-curl php8.1-gd php8.1-imagick php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-soap php8.1-zip php8.1-bcmath -y 
#RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && echo "extension=pdo_pgsql" >> "$PHP_INI_DIR/php.ini"
RUN mkdir -p /var/www/project/ && chown www-data:www-data  -R /var/www/project/
RUN mkdir -p /run/php \
 && chown -R www-data:www-data /run/php \
 && chown -R www-data:www-data ./var
 COPY ./docker/php/www.conf /etc/php/8.1/fpm/pool.d/

 WORKDIR /var/www/project/
ENTRYPOINT ["/usr/sbin/php-fpm8.1", "-F", "-R"]