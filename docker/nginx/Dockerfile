FROM nginx

ADD nginx.conf /etc/nginx/
ADD ./default.conf /etc/nginx/conf.d/

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf

CMD service nginx start

WORKDIR /var/www/src

EXPOSE 80
