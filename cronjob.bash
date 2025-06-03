#!/bin/bash

# backup directory path, temp to make it clean
backup_dir="/var/backups"
temp_dir="/var/temp"

# database credentials
db_name="andmebaas"
db_user="kasutaja"
db_pass="Passw0rd"

# temp directory creation
if [ ! -d "$temp_dir" ]; then
    echo "temp directory does not exist, creating: $temp_dir"
    mkdir -p "$temp_dir"
else
    echo "directory exists: $temp_dir"
fi

# backup directory creation
if [ ! -d "$backup_dir" ]; then {
    echo "backup directory does not exist, creating: $backup_dir"
    mkdir -p "$backup_dir"
} else {
    echo "directory exists: $backup_dir"
} fi

# date and time for backup files
date=$(date +"%Y-%m-%d_%H-%M")

# dump to temp directory
mysqldump -u "$db_user" -p"$db_pass" "$db_name" > "$temp_dir/db_$date.sql"

# compress and move ts to backup
gzip "$temp_dir/db_$date.sql"
mv "$temp_dir/db_$date.sql.gz" "$backup_dir/db_$date.sql.gz"

# delete copies older than 7 days
find "$backup_dir" -type f -mtime +7 -name "*.gz" -exec rm {} \;

# 0 */2 * * * /bin/bash /tee/skripti/asukoht/cronjob.bash
