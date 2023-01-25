<?php

$password = "123$#21z";

echo md5($password) . "<br>";
echo sha1($password) . "<br>";
echo md5("123123");

//hash(alg,string)

foreach(hash_algos() as $algo){
    echo $algo . ": " . hash($algo,$password) . "</br>";
}

//password hash

$hash= password_hash($password, PASSWORD_DEFAULT,["cost"=>10]);
echo $hash . "</br>";

//password_verify()

    if(password_verify($password,$hash)){
        echo "El password es correcto";
    }

?>