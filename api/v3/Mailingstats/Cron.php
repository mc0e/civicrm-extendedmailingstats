<?php

// This can be run like
//
// drush -r /var/www/htdocs -l example.com -u 1 civicrm-api mailingstats.cron auth=0 -y > /dev/null

function civicrm_api3_mailingstats_cron($params) {
  _mailingstats_cron($params);
}