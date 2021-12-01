FROM php:7.4-cli
COPY /php /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./index.php"]