FROM php:7.2-fpm AS phpms
RUN apt-get update && apt-get install -y \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpng-dev \
  && docker-php-ext-install -j$(nproc) iconv \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install -j$(nproc) gd
WORKDIR /image/php/
COPY file.php .
RUN php file.php > myimage.png

FROM python AS pythonms
RUN mkdir myhtml
WORKDIR /myhtml
COPY html.py .
RUN python html.py > index.html 



FROM httpd
WORKDIR /usr/local/apache2/htdocs/
COPY --from=pythonms ./myhtml .
COPY --from=phpms ./image/php/myimage.png .
EXPOSE 80