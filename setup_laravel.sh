#!/bin/bash

# create DB_HOST
node_name="${NODE_NAME}.local"

# create APP_URL
node_url="http://$node_name"

# run replacements
sed "s|NODE_NAME|$node_name|g; s|NODE_URL|$node_url|g" .env.example > .env

# create APP_KEY
php artisan key:generate
