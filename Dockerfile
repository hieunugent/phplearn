FROM php:5.6-cli
RUN curl -fsSL 'https://xcache.lighttpd.net/pub/Releases/3.2.0/xcache-3.2.0.tar.gz' -o xcache.tar.gz \
    && mkdir -p xcache \
    && tar -xf xcache.tar.gz -C xcache --strip-components=1 \
    && rm xcache.tar.gz \
    && ( \
    cd xcache \
    && phpize \
    && ./configure --enable-xcache \
    && make -j "$(nproc)" \
    && make install \
    ) \
    && rm -r xcache \
    && docker-php-ext-enable xcache