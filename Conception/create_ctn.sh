#!/bin/bash

docker run -d --name trucksmania_ctn -p 127.0.0.1:80:80 -v $(pwd)/app:/app tutu_php_lamp:latest;

exit 0;