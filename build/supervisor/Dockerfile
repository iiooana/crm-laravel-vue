FROM crm_vue_frontend:latest
USER root

#SUPERVISOR
RUN apt-get install -y supervisor
RUN mkdir -p /var/log/supervisor
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY ./up.sh /up.sh
RUN chmod +x /up.sh

ENTRYPOINT ["/up.sh"]