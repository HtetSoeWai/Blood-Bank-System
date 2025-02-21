<?php

$password = "myPassword123#";

if (preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password)) {
    echo "Password is strong.";
} else {
    echo "Password is not strong enough.";
}

?>