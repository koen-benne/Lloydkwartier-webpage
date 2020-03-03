#!/bin/bash -l

current_dir=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )
cd ${current_dir}/app/

echo "Creating error.log"

mkdir "logs"

cat << EOF > logs/error.log
EOF

echo "Creating personalSettings.php"

cat << EOF > config/personalSettings.php
<?php
//Define DB credentials
define("DB_HOST", "192.168.50.5"); // Change this if you are using a different host
define("DB_USER", "root"); // The username of the user of the database that will be used
define("DB_PASS", "root"); // The password of the user of the database that will be used
define("DB_NAME", "lloydkwartier"); // The name of the database
EOF