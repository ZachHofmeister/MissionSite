FROM httpd:2.4

# Enable mod_rewrite and mod_proxy
RUN sed -i 's/#LoadModule rewrite_module/LoadModule rewrite_module/' /usr/local/apache2/conf/httpd.conf
RUN sed -i 's/#LoadModule proxy_module/LoadModule proxy_module/' /usr/local/apache2/conf/httpd.conf
RUN sed -i 's/#LoadModule proxy_fcgi_module/LoadModule proxy_fcgi_module/' /usr/local/apache2/conf/httpd.conf

# Change DocumentRoot from "/usr/local/apache2/htdocs" to "/var/www/html"
RUN sed -i 's|DocumentRoot "/usr/local/apache2/htdocs"|DocumentRoot "/var/www/html"|' /usr/local/apache2/conf/httpd.conf
RUN sed -i 's|<Directory "/usr/local/apache2/htdocs">|<Directory "/var/www/html">|' /usr/local/apache2/conf/httpd.conf

# Configure Apache to work with PHP-FPM
RUN echo "DirectoryIndex index.php index.html" >> /usr/local/apache2/conf/httpd.conf
RUN echo "ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://php:9000/var/www/html/\$1" >> /usr/local/apache2/conf/httpd.conf
# RUN echo "ProxyPassMatch ^/(.*\.php(/.*)?)$ fcgi://php:9000/usr/local/apache2/htdocs/$1" >> /usr/local/apache2/conf/httpd.conf

# Enable .htaccess files
RUN sed -i '/<Directory "\/var\/www\/html">/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /usr/local/apache2/conf/httpd.conf
