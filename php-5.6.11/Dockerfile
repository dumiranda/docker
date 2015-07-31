FROM centos:6

ENV PHP_VERSION=5.6.11

RUN yum -y install gcc gcc-c++ kernel-devel \
        libxml2-devel libXpm-devel gmp-devel libicu-devel t1lib-devel \
     	aspell-devel openssl-devel bzip2-devel libcurl-devel libvpx-devel freetype-devel \
    	readline-devel libtidy-devel wget tar \

    && wget http://packages.sw.be/rpmforge-release/rpmforge-release-0.5.2-2.el6.rf.x86_64.rpm \
	&& rpm --import http://apt.sw.be/RPM-GPG-KEY.dag.txt \
	&& rpm -K rpmforge-release-0.5.2-2.el6.rf.*.rpm \
	&& rpm -i rpmforge-release-0.5.2-2.el6.rf.*.rpm \
	&& yum -y install libmcrypt-devel

RUN wget http://ar2.php.net/get/php-5.6.11.tar.gz/from/this/mirror -O php.tar.gz \
	&& tar xvf php.tar.gz \
	&& cd php*/ \
	&& ./configure --with-libdir=lib64 --prefix=/usr/local --with-layout=PHP \
    && make \
    && make test \
    && make install