<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/src/lqs/protected/extensions/BraintreeApi/lib'); // getcwd().
                                                                                                              // require_once('Braintree/Braintree.php');
require_once ('Braintree/Configuration.php');

Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('rhbp25kgxkcnhpmm');
Braintree_Configuration::publicKey('24x38b2zbs9ys4y9');
Braintree_Configuration::privateKey('c87894424439f0e9cfd9af7ebe79e123');
?>