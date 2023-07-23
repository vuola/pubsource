#!/bin/bash

while true; do
  if [ -e /ready ]; then
    echo "File /ready found. Running ./setup_laravel.sh..."

        rm /ready

        # create DB_HOST
        mariadb_host="${MARIADB_SERVICE_HOST}"

        # create APP_URL
        node_name="${NODE_NAME}.local"
        node_url="http://$node_name"

        # run replacements
        sed "s|MARIADB_HOST|$mariadb_host|g; s|NODE_URL|$node_url|g" .env.example > .env

        # generate APP_KEY
        php artisan key:generate

    break
  else
    echo "File /ready not found. Retrying in 5 seconds..."
    sleep 5
  fi
done

# create DB_HOST
mariadb_host="${MARIADB_SERVICE_HOST}" && \

# create APP_URL
node_name="${NODE_NAME}.local" && \
node_url="http://$node_name" && \

# run replacements
sed "s|MARIADB_HOST|$mariadb_host|g; s|NODE_URL|$node_url|g" .env.example > .env && \

# generate APP_KEY
php artisan key:generate
