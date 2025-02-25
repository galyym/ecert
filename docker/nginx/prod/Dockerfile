FROM nginx:latest

# Удаляем дефолтный конфиг
RUN rm /etc/nginx/conf.d/default.conf

# Копируем наш конфиг
COPY ./docker/nginx/prod/nginx.conf /etc/nginx/conf.d/default.conf

# Опционально: проверка конфигурации при сборке
RUN nginx -t
