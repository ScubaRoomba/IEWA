When setting up poison, you must:
1. Allow the apache user access to the log files. This can be accomplished by granting the apache user ownership of the "/var/log/httpd", or "/var/log/apache2", etc, directory.
2. Set "allow_url_include = On" in php.ini
3. Edit reset.php to include the proper log file location.