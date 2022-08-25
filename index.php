<?php
	// include();//try to import a file and warn us on failure
	// include_once();//try import a file (if it was not previsiously imported) and warn us on failure
	// require();//try to import a file and halt on a failure
	// require_once();//try to import a file(if it was not previsously imported) and halt on failure

	require_once('app/core/init.php'); 
	//echo 'require_once from index.php';

	new \app\core\App();
	
