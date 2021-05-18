<?php
    // returns the hashed password
    function hashPass($pass) {
        return password_hash($pass, PASSWORD_DEFAULT);
    } 

    // returns true if passwords match\
    function checkPass($passIn, $passStore) {
        return password_verify($passIn, $passStore);
    }
?>