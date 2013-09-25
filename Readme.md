# ExtendedMailingStats CiviCRM extension

This extension provides extended summary reports on CiviCRM mailings

## Cron job setup

Stats are collected by a cron job rather than when the report is collected.  The cron job 
needs to be set up to run a command along the lines of:

    drush -r /var/www/example.org/htdocs -l example.org -u 1 civicrm-api extendedmailingstats.cron auth=0 -y

The cron job should run as the web server user.

## Data Provided

 * Mailing Name 
 * Date Created 
 * Start Date 
 * End Date 
 * recipients 
 * delivered 
 * bounced 
 * opened 
 * unsubscribed 
 * forwarded 
 * clicked_total 
 * clicked_unique 
 * trackable_urls 
 * clicked_contribution_page 
 * contributions_48hrs_count 
 * contributions_48hrs_total 
 * gmail_recipients 
 * gmail_delivered 
 * gmail_opened 
 * gmail_clicked_total 
 * gmail_clicked_unique

## Authorship

This module was developed by Andrew McNaughton <andrew@mcnaughty.com> for the Australian Greens <http://greens.org.au>





