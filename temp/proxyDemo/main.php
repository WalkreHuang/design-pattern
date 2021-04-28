<?php

require_once 'UserController.php';
require_once 'UserControllerProxy.php';

(new UserControllerProxy(new UserController()))->register('13666668888', 'agas');

(new UserControllerProxy(new UserController()))->login('13666668888', 'agas');