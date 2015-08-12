#!/bin/bash
echo 'Publishing'
mysqldump --user root --password=123 amani_wordpress > amani_wordpress.sql
git add amani_wordpress.sql
git commit -m "auto: add database_dump"
git push
