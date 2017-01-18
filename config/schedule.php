<?php

// в кроне прописать
// * * * * * php {полный путь к yii}/yii schedule/run --scheduleFile=@app/config/schedule.php 1>> /dev/null 2>&1
// * * * * * php /var/www/templates/yii2/base/yii schedule/run --scheduleFile=@app/config/schedule.php 1>> /dev/null 2>&1

$schedule->command('hello/index')->cron('* * * * *');