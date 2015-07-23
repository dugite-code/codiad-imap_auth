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

// Auto create new users on Authentication success?
$autouser = true;

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
			
			$User = new User();
			$User->username = $login;
			
			// Check if user already exists
			if ( $User->CheckDuplicate() ) {
				
				// Check if auto creation of users is allowed
				if ( $autouser == true ) {
					
					// Create a new user
					$User->users[] = array( 'username' => $login, 'password' => null, 'project' => "" );
					saveJSON( "users.php", $User->users );
					$_SESSION['user'] = $login;
					
				} else {
					
					// Deny login, unable to create new user
					die( formatJSEND( "error", "Unable to register new user: " . $User->username . ". Please contact your system Administrator" ) );
				}
			} else {
				$_SESSION['user'] = $login;
			}
			
		} else {
			imap_close($imap);
			// If login fails send error message
			die( formatJSEND( "error", "User " . $login . " does not exist within Codiad." ) );
		}			
	}
	
}
?>