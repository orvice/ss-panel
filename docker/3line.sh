#! /bin/bash
lines_array="'ulimit -n 51200' 'ulimit -Sn 4096' 'ulimit -Hn 8192'"
files_array=("/etc/profile" "/etc/default/supervisor")
for file in ${files_array[*]}
do 
	eval "for line in $lines_array; do echo \$line >> \$file; done"
done