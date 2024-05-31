FROM node:20.14-alpine

RUN mkdir -p /home/node/app/node_modules && chown -R node:node /home/node/app

WORKDIR /home/node/app


USER node



EXPOSE 8080 3000

COPY entrypoint.sh /sbin/entrypoint.sh

CMD ["/sbin/entrypoint.sh"]
