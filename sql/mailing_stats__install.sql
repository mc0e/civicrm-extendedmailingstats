CREATE TABLE IF NOT EXISTS `agc_report_mailing_stats` (
  `mailing_id` INT(10) UNSIGNED NOT NULL,
  `mailing_name` VARCHAR(128) NULL DEFAULT NULL COLLATE 'utf8_unicode_ci',
  `is_completed` TINYINT(4) NULL DEFAULT NULL,
  `created_date` TIMESTAMP NULL DEFAULT NULL,
  `start` TIMESTAMP NULL DEFAULT NULL,
  `finish` TIMESTAMP NULL DEFAULT NULL,
  `recipients` INT(10) UNSIGNED NULL DEFAULT NULL,
  `delivered` INT(10) UNSIGNED NULL DEFAULT NULL,
  `send_rate` FLOAT UNSIGNED NULL DEFAULT NULL,
  `bounced` INT(10) UNSIGNED NULL DEFAULT NULL,
  `opened` INT(10) UNSIGNED NULL DEFAULT NULL,
  `opened_unique` INT(10) UNSIGNED NULL DEFAULT NULL,
  `unsubscribed` INT(10) UNSIGNED NULL DEFAULT NULL,
  `forwarded` INT(10) UNSIGNED NULL DEFAULT NULL,
  `clicked_total` INT(10) UNSIGNED NULL DEFAULT NULL,
  `clicked_unique` INT(10) UNSIGNED NULL DEFAULT NULL,
  `trackable_urls` INT(10) UNSIGNED NULL DEFAULT NULL,
  `clicked_contribution_page` INT(10) UNSIGNED NULL DEFAULT NULL,
  `contributions_48hrs_count` INT(10) UNSIGNED NULL DEFAULT NULL,
  `contributions_48hrs_total` FLOAT UNSIGNED NULL DEFAULT NULL,
  `gmail_recipients` FLOAT UNSIGNED NULL DEFAULT NULL,
  `gmail_delivered` FLOAT UNSIGNED NULL DEFAULT NULL,
  `gmail_opened` FLOAT UNSIGNED NULL DEFAULT NULL,
  `gmail_opened_unique` FLOAT UNSIGNED NULL DEFAULT NULL,
  `gmail_clicked_total` FLOAT UNSIGNED NULL DEFAULT NULL,
  `gmail_clicked_unique` FLOAT UNSIGNED NULL DEFAULT NULL,
  `yahoo_recipients` FLOAT UNSIGNED NULL DEFAULT NULL,
  `yahoo_delivered` FLOAT UNSIGNED NULL DEFAULT NULL,
  `yahoo_opened` FLOAT UNSIGNED NULL DEFAULT NULL,
  `yahoo_opened_unique` FLOAT UNSIGNED NULL DEFAULT NULL,
  `yahoo_clicked_total` FLOAT UNSIGNED NULL DEFAULT NULL,
  `yahoo_clicked_unique` FLOAT UNSIGNED NULL DEFAULT NULL,
  `hotmail_recipients` FLOAT UNSIGNED NULL DEFAULT NULL,
  `hotmail_delivered` FLOAT UNSIGNED NULL DEFAULT NULL,
  `hotmail_opened` FLOAT UNSIGNED NULL DEFAULT NULL,
  `hotmail_opened_unique` FLOAT UNSIGNED NULL DEFAULT NULL,
  `hotmail_clicked_total` FLOAT UNSIGNED NULL DEFAULT NULL,
  `hotmail_clicked_unique` FLOAT UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`mailing_id`),
  INDEX `start` (`start`),
  INDEX `finish` (`start`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;

CREATE TABLE IF NOT EXISTS `agc_report_mailing_stats_performance` (
  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doing` VARCHAR(64) NOT NULL COLLATE 'utf8_unicode_ci'
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
;

