#!/bin/bash

USER=u126014  #юзер базы данных
PASSWORD=?@Q#mOHnwq  #пароль
BACKUP=/backups  #куда сохранять бэкапы
LOG=/logs  # директория для чистки старых логов
OLD=30  # сколько дней хранить бэкапы (более старые будет удаляться)
PREFIX=work  # если несколько серверов - используйте разные префиксы, чтобы не путаться
DATE=`date '+%Y-%m-%d'`

echo "Backup database to $BACKUP"
mkdir $BACKUP/$DATE.sql
cd $BACKUP/$DATE.sql
    for i in `mysql -u $USER -p$PASSWORD -e'show databases;' | grep -v information_schema | grep -v Database`;
        do mysqldump -u $USER -p$PASSWORD $i > $DATE-$i.sql;
    done

cd ..
tar -cjf $BACKUP/$DATE-sql-$PREFIX.tar.bz2 ./$DATE.sql
rm -rf ./$DATE.sql


echo "Backup files to $BACKUP"
tar -cjf $BACKUP/$DATE-files-$PREFIX.tar.bz2  \
    /rusvpncom/www \
    /.ssh \
    --exclude=$BACKUP

echo "Deleting old backups and logs from $BACKUP & $LOG"
find $LOG -type f \( -name "*.gz" -o -name "*.1*" \) -exec rm '{}' \;
find $BACKUP -mtime +$OLD -exec rm '{}' \;