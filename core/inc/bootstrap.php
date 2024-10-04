<?php
define("PROJECT_ROOT_PATH", __DIR__ . "/../../");
// include main configuration file 
require_once PROJECT_ROOT_PATH . "/core/inc/config.php";
// include the base controller file 
require_once PROJECT_ROOT_PATH . "/core/controllers/base_controller.php";

require_once PROJECT_ROOT_PATH . "/core/helpers/response_helper.php";

require_once PROJECT_ROOT_PATH . "/core/helpers/base_api.php";

require_once PROJECT_ROOT_PATH . "/core/database/conexion.php";

// include the use model file 
require_once PROJECT_ROOT_PATH . "/core/models/institucion_model.php";
require_once PROJECT_ROOT_PATH . "/core/models/categoria_model.php";
require_once PROJECT_ROOT_PATH . "/core/models/producto_model.php";


// include controllers
require_once PROJECT_ROOT_PATH . "/core/controllers/institucion_controller.php";
require_once PROJECT_ROOT_PATH . "/core/controllers/categoria_controller.php";
require_once PROJECT_ROOT_PATH . "/core/controllers/producto_controller.php";