FROM centos:6

SET NGINX_PATH /usr/local/nginx

WORKDIR ${NGINX_PATH}

RUN yum -y install gcc gcc-c++ kernel-devel wget tar

RUN yum -y install pcre-devel openssl-devel \
	&& wget http://nginx.org/download/nginx-1.9.3.tar.gz -O nginx.tar.gz \
	&& tar xvf nginx.tar.gz \
	&& cd nginx*/ \
	&& ./configure \
    	--sbin-path=${NGINX_PATH}/nginx \
    	--conf-path=${NGINX_PATH}/nginx.conf \
    	--pid-path=${NGINX_PATH}/nginx.pid \
    	--with-http_ssl_module \
    && make \
    && make install

RUN ln -s ${NGINX_PATH}/nginx /usr/bin/nginx

COPY conf/* ${NGINX_PATH}

CMD nginx && tail -f /dev/null