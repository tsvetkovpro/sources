<?php

// prefix: daily, weekly, monthly
$prefix = '';
if (!empty($argv[1])) {
    $prefix = $argv[1] . '_';
}

return array(
    // common options
    'common' => array(
        'tar_cmd' => '/bin/tar',

        'backup_filename_prefix' => $prefix,
        'backup_filename' => 'rusvpncom',
    ),
    // backup options
    'backup' => array(
        // directory backup
        'directory' => array(
            'tar_cmd' => '/bin/tar',
            'items' => array(
                array(
                    'name' => 'u126014',
                    'path' => '/home2/u126014/rusvpncom',
                    'exclude' => 'tmp,logs,cache',
                )
            )
        ),
        // database backup
        'mysql' => array(
            'mysqldump_cmd' => '/usr/bin/mysqldump',
            'user' => 'u126014',
            'password' => '?@Q#mOHnwq',
            'host' => 'idb1.majordomo.ru',
            'items' => array(
                array(
                    'db_name' => 'b126014_rusvpn',
                    'ignore_tables' => 'test',
                    'tables_structure' => 'blog_blog, blog_blog_user, blog_comment, blog_comment_online, blog_favourite, blog_favourite_tag, blog_friend, blog_geo_city, blog_geo_country, blog_geo_region, blog_geo_target, blog_invite, blog_notify_task, blog_reminder, blog_session, blog_stream_event, blog_stream_subscribe, blog_stream_user_type, blog_subscribe, blog_talk, blog_talk_blacklist, blog_talk_user, blog_topic, blog_topic_content, blog_topic_photo, blog_topic_question_vote, blog_topic_read, blog_topic_tag, blog_user, blog_userfeed_subscribe, blog_user_administrator, blog_user_changemail, blog_user_field, blog_user_field_value, blog_user_note, blog_vote, blog_wall',
                ),
            ),
        ),
    ),
    // upload backup options
    'upload' => array(
        // upload to local directoey
        'directory' => array(
            'max_count' => 3,
            'path' => '/home2/u126014/backups/',
        ),
    ),
    // notification options
    'nofification' => array(
        // email notification
        'email' => array(
            'on_success' => array(
                'to' => '285019@gmail.com',
                'subject' => 'Success backup',
                'template' => realpath(__DIR__ . '/Command/Notification/email_templates/success.php')
            ),
            'on_failed' => array(
                'to' => '285019@gmail.com',
                'subject' => 'Failed backup',
                'template' => realpath(__DIR__ . '/Command/Notification/email_templates/failed.php')
            ),
        ),
    ),
);