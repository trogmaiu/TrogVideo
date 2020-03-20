#!/bin/bash
while :;
do
sleep 2
sed -i '/ffmpeg/d' /var/www/trogsearch/public_html/converter.sh
sleep 1
done
