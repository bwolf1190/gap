<?php
use \Rollbar\Rollbar;
use \Rollbar\Payload\Level;

// installs global error and exception handlers
Rollbar::init(
	array(
		'access_token' => 'e1c00c96a36e461d8afb50760ae662b5',
		'environment' => 'development'
	)
);

// Message at level 'info'
Rollbar::log(Level::info(), 'testing 123');

// Catch an exception and send it to Rollbar
try {
    throw new \Exception('test exception');
} catch (\Exception $e) {
    Rollbar::log(Level::error(), $e);
}

// Will also be reported by the exception handler
throw new Exception('test 2');

?>