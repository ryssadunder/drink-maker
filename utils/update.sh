echo "Checking for updates"
sleep 20
    cd /var/www/drink-maker
    REMOTES="$(sudo git remote show origin)"
    #ONLY IF UPDATES ARE ENABLED
    if [[ "$REMOTES" == *"Fetch URL: https://github.com/ryssadunder/drink-maker.git"* ]]
    then
      echo "Updates enabled"
      sudo git reset --hard
      OUTPUT="$(sudo git pull origin master)"
      if [[ "$OUTPUT" == *"files changed"* || "$OUTPUT" == *"file changed"* ]]
      then
        echo "Updates found"
        if [[ "$OUTPUT" == *"install/default"* ]]
        then
          echo "Copying nginx updated files"
          sudo cp /var/www/drink-maker/install/default /etc/nginx/sites-available/default
          sudo ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default
        fi
        if [[ "$OUTPUT" == *"install/www.conf"* ]]
        then
          echo "Updating www.conf"
          sudo rm /etc/php5/fpm/pool.d/www.conf
          sudo cp /var/www/install/www.conf /etc/php5/fpm/pool.d/www.conf
        fi
        if [[ "$OUTPUT" == *"install/php.ini"* ]]
        then
          echo "Updating php.ini"
          sudo rm /etc/php5/fpm/php.ini
          sudo cp /var/www/install/php.ini /etc/php5/fpm/php.ini
        fi
        echo "Restarting services"
        sudo service php5-fpm restart
        sudo service nginx restart
        if [[ "$OUTPUT" == *"utils/drink-makerController.sh"* ]]
        then
          echo "Updating startup"
          sudo cp /var/www/drink-maker/utils/drink-makerController.sh /etc/init.d/drink-maker.sh
          sudo chmod +x /etc/init.d/drink-maker.sh
          sudo update-rc.d drink-maker.sh defaults 
        fi
        sudo chown www-data:www-data /var/www/drink-maker -R
        sudo chmod 0775 /var/www/drink-maker/storage -R
      elif [[ "$OUTPUT" == *"Already up-to-date."* ]]
      then
        echo "Already up to date."
      else #Strange output
        echo "Updates disabled"
      fi
    else #Updates disabled
      echo "Updates disabled"
    fi
