<?php

require '../bootstrap.php';

$page = isset($_GET['page']) ? $_GET['page'] : 'index';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

Foundation\Request::dispatch($page, $action);
<<<<<<< 04fe061ff32a8cd6b769e1129fdea28d48e93680
=======
//teste novo
>>>>>>> Version 1.0
