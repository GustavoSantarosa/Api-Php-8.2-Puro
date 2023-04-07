<?php

use App\Services\User\UserService;

require_once('../../../bootstrap.php');

$userService = new UserService();

echo json_encode($userService->index());