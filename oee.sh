#!/bin/bash

file0name='/var/www/html/kpi/oee.csv'
file1name='/mnt/seachill/l_drive/Continuous Improvement/Resolutions/OEE Screens/Chilled_PrePack_AM.csv'
file2name='/mnt/seachill/l_drive/Continuous Improvement/Resolutions/OEE Screens/Chilled_PrePack_PM.csv'

if [ -a "$file0name" ]; then
  file0time=$(stat -c %Y "$file0name")
else
  touch -d "24 hours ago" $file0name
  file0time=$(stat -c %Y "$file0name")
fi

if grep -qs '/mnt/seachill' /proc/mounts; then
  file1time=$(stat -c %Y "$file1name")
  file2time=$(stat -c %Y "$file0name")
else
#  It's not mounted. Try remount and try again.
  mount -t cifs //SEAADMIN/Depts\ Data /mnt/seachill/l_drive -o _netdev,credentials=/root/.smbcredentials,domain=seachill.co.uk,dir_mode=0755,file_mode=0755,uid=500,gid=500
  sleep 1
  file1time=$(stat -c %Y "$file1name")
  file2time=$(stat -c %Y "$file0name")
fi

if [ "$file1time" -gt "$file0time" ] && [ "$file1time" -gt "$file2time" ]; then
  cp -fu "$file1name" "$file0name"
elif [ "$file2time" -gt "$file0time" ]; then
  cp -fu "$file2name" "$file0name"
fi
