#Codiad-IMAP_Auth
Codiad External Authentication via IMAP
Mirrors - [ [GitLab](https://gitlab.com/dugite-code/codiad-imap_auth) | [Bitbucket](https://bitbucket.org/dugite-code/codiad-imap_auth) | [Github](https://gitlab.com/dugite-code/codiad-imap_auth) ]

Based off: [Codiad-LDAPExternalAuth](https://github.com/QMXTech/Codiad-LDAPExternalAuth/), [HTTP Authentication for Codiad](https://gist.github.com/basteln3rk/4cab14ebd990e46efaef) and auth_rcmail - [ [(GitHub)](https://github.com/dugite-code/auth_rcmail) | [(GitLab)](https://gitlab.com/dugite-code/auth_rcmail) ]

**NOTE: Requires php-imap:**

```
apt-get install php5-imap
php5enmod imap
```

[Installation instructions sourced from here](https://secure.php.net/manual/en/imap.setup.php)

## Instalation
1. Download imap_auth.php:

		wget https://gitlab.com/dugite-code/codiad-imap_auth/raw/master/imap_auth.php
	
2. Copy to the root Codiad directory:

		cp ./imap_auth.php /var/www/Codiad/

3. Edit the configuration portion of imap_auth.php to match your email server requirements.

		$IMAP_AUTH_SERVER = 'your.imap.server:port';

		$IMAP_AUTH_OPTIONS = '/tls/norsh';
		
	See http://php.net/manual/ru/function.imap-open.php for full options list.
		
4. Add the path to the Codiad config.php:

		nano /var/www/Codiad/config.php

		define("AUTH_PATH", BASE_PATH . "/imap_auth.php");

# Buy me a Beer

| Bitcoin  | Litecoin |
| ------------- | ------------- |
| <p align="center"><img alt="image" align="middle" style="max-width: 250px;" src="https://raw.githubusercontent.com/dugite-code/Icons/master/Donation%20Icons/bitcoin.svg?sanitize=true"></p> | <p align="center"><img alt="image" style="max-width: 250px;" src="https://raw.githubusercontent.com/dugite-code/Icons/master/Donation%20Icons/litecoin.svg?sanitize=true"></p> |
| **Bitcoin Address:** 155xGQ2sPt2BAbmLUp5myyfjLmAm3c8pPP | **Litecoin Address:** LNiBt4ksgDgTqGq4BYcLS8vtNkdn1Lrmmh |

**Website:** [PeekRead.Info](https://peekread.info)
