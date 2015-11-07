https://github.com/AlexeyFreelancer/BackupTask


folders BackupTask and ClassLoader are works, and they are work at webserver majordomo rusvpn.com

cron:

0 23 10 * * /home2/u126014/BackupTask/backup.php weekly


минуты 					— число от 0 до 59
часы 					— число от 0 до 23
день месяца 			— число от 1 до 31
номер месяца в году 	— число от 1 до 12
день недели 			— число от 0 до 7 (0-Вс,1-Пн,2-Вт,3-Ср,4-Чт,5-Пт,6-Сб,7-Вс)



other cron example: (поле1 поле2 поле3 поле4 поле5 команда)

# выполнять задание раз в час в 0 минут
0 */1 * * * /home/u12345/script.pl

# выполнять задание каждые три часа в 0 минут
0 */3 * * * /home/u12345/script.pl

# выполнять задание по понедельникам в 1 час 15 минут ночи
15 1 * * 1 /home/u12345/script.pl

# выполнять задание 5 апреля в 0 часов 1 минуту каждый год
1 0 5 4 * /home/u12345/script.pl

# выполнять задание в пятницу 13 числа в 13 часов 13 минут
13 13 13 * 5 /home/u12345/script.pl

# выполнять задание ежемесячно 1 числа в 6 часов 10 минут
10 6 1 * * /home/u12345/script.pl