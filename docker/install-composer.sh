#!/bin/sh

# Download the Composer installer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Verify the installer signature
SIGNATURE=$(php -r "echo hash_file('SHA384', 'composer-setup.php');")
EXPECTED_SIGNATURE=$(wget -q -O - https://composer.github.io/installer.sig)

if [ "$EXPECTED_SIGNATURE" != "$SIGNATURE" ]; then
    echo 'ERROR: Invalid installer signature'
    rm composer-setup.php
    exit 1
else
    echo 'Installer verified'
fi

# Run the Composer installer quietly and move to /usr/local/bin
php composer-setup.php --quiet --install-dir=/usr/local/bin --filename=composer
RESULT=$?

# Remove the installer script
rm composer-setup.php

# Check if Composer installation was successful
if [ $RESULT -eq 0 ]; then
    echo 'Composer installed successfully'
else
    echo 'ERROR: Composer installation failed'
fi

exit $RESULT
