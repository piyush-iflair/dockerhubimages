FROM  php:7.4-apache
# Enable necessary Apache modules
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
