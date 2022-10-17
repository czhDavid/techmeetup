FROM ubuntu:latest

RUN apt-get -y update && apt-get upgrade 

RUN apt-get -y install apache2 && a2enmod rewrite mpm_event proxy_fcgi setenvif 
RUN mkdir /var/www/project/ && chown www-data:www-data  -R /var/www/project/
COPY  ./docker/apache/etc/ /etc/

CMD ["apachectl", "-D",  "FOREGROUND"]