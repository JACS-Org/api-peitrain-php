<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../../");
// include main configuration file 
require_once PROJECT_ROOT_PATH . "/core/inc/config.php";
// include the base controller file 
require_once PROJECT_ROOT_PATH . "/core/controllers/base_controller.php";

require_once PROJECT_ROOT_PATH . "/core/helpers/response_helper.php";

require_once PROJECT_ROOT_PATH . "/core/helpers/base_api.php";

// include the use model file 
require_once PROJECT_ROOT_PATH . "/core/models/institucion_model.php";
