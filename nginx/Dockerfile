FROM centos:6

RUN yum -y install gcc gcc-c++ kernel-devel wget tar

RUN yum -y install pcre-devel openssl-devel \
	&& wget http://nginx.org/download/nginx-1.9.3.tar.gz -O nginx.tar.gz \
	&& tar xvf nginx.tar.gz \
	&& cd nginx*/ \
	&& ./configure \
    	--sbin-path=/usr/local/nginx/nginx \
    	--conf-path=/usr/local/nginx/nginx.conf \
    	--pid-path=/usr/local/nginx/nginx.pid \
    	--with-http_ssl_module \
    && make \
    && make install

COPY nginx/nginx.conf /usr/local/nginx/nginx.conf
COPY nginx/vhosts/* /usr/local/nginx/vhosts.d/

CMD tail -f /dev/null