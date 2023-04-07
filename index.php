<?php

use App\Models\User;
require_once('./vendor/autoload.php');

$user = new User();

echo $user->get();