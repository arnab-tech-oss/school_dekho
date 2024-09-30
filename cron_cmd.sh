DATE=$(date '+%Y-%m-%d')
php /home/sduser/web/schooldekho.org/public_html/artisan auto:leadtransfer >> "/home/sduser/web/schooldekho.org/public_html/cron_log/${DATE}.log" 2>&1
