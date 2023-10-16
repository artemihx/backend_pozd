FROM nginx:1.25.2-alpine

WORKDIR /var/www

COPY ./prod/images/nginx/nginx.conf /etc/nginx/conf.d/default.conf

COPY project/public /var/www

EXPOSE 80