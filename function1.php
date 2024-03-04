<?php
function UserArray($name, $email) {
    $user = [
        'name' => $name,
        'email' => $email,
    ];
    return $email;
}
$user = UserArray('Pankaj Sharma', 'pankaj@palustya.com');
print_r($user);
?>
