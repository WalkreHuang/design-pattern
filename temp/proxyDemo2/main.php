<?php

require_once 'UserController.php';
require_once 'UserControllerProxy.php';

(new UserControllerProxy())->register('13666668888', 'agas');

(new UserControllerProxy())->login('13666668888', 'agas');