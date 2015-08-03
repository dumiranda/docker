#up - docker run -it --net=host --name phalcon -v /etc/localtime:/etc/localtime:ro -p 9000:9000 -d php:local 

FROM centos:6

ENV PHP_VERSION=5.6.11
ENV PHP_CONF=/usr/local/lib/php.ini
ENV PHP_FPM_CONF=/usr/local/etc/php-fpm.conf

RUN yum -y install gcc gcc-c++ kernel-devel \
        libxml2-devel libXpm-devel gmp-devel libicu-devel t1lib-devel \
     	aspell-devel openssl-devel bzip2-devel libcurl-devel libvpx-devel freetype-devel \
    	readline-devel libtidy-devel wget tar git \

    && wget http://packages.sw.be/rpmforge-release/rpmforge-release-0.5.2-2.el6.rf.x86_64.rpm \
	&& rpm --import http://apt.sw.be/RPM-GPG-KEY.dag.txt \
	&& rpm -K rpmforge-release-0.5.2-2.el6.rf.*.rpm \
	&& rpm -i rpmforge-release-0.5.2-2.el6.rf.*.rpm \
	&& yum -y install libmcrypt-devel

# install php
RUN wget http://ar2.php.net/get/php-${PHP_VERSION}.tar.gz/from/this/mirror -O php.tar.gz \
	&& tar xvf php.tar.gz \
	&& cd php*/ \
	&& ./configure --with-libdir=lib64 --prefix=/usr/local --with-layout=PHP --enable-fpm --enable-mbstring \
		--with-openssl --with-pdo-mysql \
    && make \
    && make install

#install phalcon extension
RUN git clone --depth=1 https://github.com/phalcon/cphalcon.git \
	&& cd cphalcon/build/ \
	&& ./install

COPY conf/php.ini ${PHP_CONF}
COPY conf/php-fpm.conf ${PHP_FPM_CONF}

EXPOSE 9000

# cleanup
RUN rm -rf php*/ cphalcon/ rpmforge-release-*.rpm

CMD php-fpm && tail -f /dev/null