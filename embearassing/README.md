When setting up embearassing, you must:
1. (Optional, only if you intend to allow Apache Log Poisoning) Allow the apache user access to the log files. This can be accomplished by granting the apache user ownership of the "/var/log/httpd", or "/var/log/apache2", etc, directory.
2. Set "allow_url_include = On" in php.ini
