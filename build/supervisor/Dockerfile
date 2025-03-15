FROM crm_vue_frontend:latest
USER root

#SUPERVISOR
RUN apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN touch /var/www/html/storage/logs/laravel_schedule.log
RUN touch /var/www/html/storage/logs/laravel_queue_normal.log

COPY ./up.sh /up.sh
RUN chmod +x /up.sh

ENTRYPOINT ["/up.sh"]