<?php
///////////////////
// CONFIGURATION //
/////////////////////////////////////////////////////////////////////////////

// IMAP server to use
$IMAP_AUTH_SERVER = 'your.imap.server:port';

// IMAP Options: http://php.net/manual/ru/function.imap-open.php
// default is to force use of start-TLS and not use rsh or ssh.
// Use novalidate-cert for self-signed certificates
$IMAP_AUTH_OPTIONS = '/tls/norsh';

/////////////////////////////////////////////////////////////////////////////

require_once( COMPONENTS . "/user/class.user.php" );

if ( !isset( $_SESSION['user'] ) ) {
	
	// Username and password post check
	if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
		
		$login = $_POST['username'];
		$password = $_POST['password'];

		// Attempt to log into IMAP server
		$imap = imap_open(
		"{" . $IMAP_AUTH_SERVER . $IMAP_AUTH_OPTIONS . "}INBOX",
		$login,
		$password);
		
		if ($imap) {
			imap_close($imap);
			$_SESSION['user'] = $login;
			
		} else {
			// If login fails send error message
			die( formatJSEND( "error", "User " . $login . " does not exist within Codiad." ) );
		}			
	}
	
}
?>