#!/bin/bash

docker compose down

docker compose up -d

./run.sh composer install

#docker/init.sh
#(cd docker/ && ./init.sh)
