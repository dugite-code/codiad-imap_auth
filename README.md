#Codiad-IMAP_Auth
Codiad External Authentication via IMAP

Based off: [Codiad-LDAPExternalAuth](https://github.com/QMXTech/Codiad-LDAPExternalAuth/), [HTTP Authentication for Codiad](https://gist.github.com/basteln3rk/4cab14ebd990e46efaef) and [auth_rcmail](https://github.com/dugite-code/auth_rcmail)

## Instalation
1. Download imap_auth.php:

		wget https://github.com/dugite-code/codiad-imap_auth/blob/master/imap_auth.php
	
2. Copy to the root Codiad directory:

		cp ./imap_auth.php /var/www/Codiad/

3. Edit the configuration portion of imap_auth.php to match your email server requirements.

		$IMAP_AUTH_SERVER = 'your.imap.server:port';

		$IMAP_AUTH_OPTIONS = '/tls/norsh';
		
	See http://php.net/manual/ru/function.imap-open.php for full options list.
		
4. Add the path to the Codiad config.php:

		nano /var/www/Codiad/config.php

		define("AUTH_PATH", BASE_PATH . "/imap_auth.php");
