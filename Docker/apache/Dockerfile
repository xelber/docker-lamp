FROM httpd:2.4

RUN apt-get update; \
    apt-get install vim -y;

COPY custom.apache.conf /usr/local/apache2/conf/custom.apache.conf
RUN echo "Include /usr/local/apache2/conf/custom.apache.conf" \
    >> /usr/local/apache2/conf/httpd.conf
