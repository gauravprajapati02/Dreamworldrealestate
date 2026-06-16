<?php

include 'includes/database.php';

if($conn){
    echo "Database Connected Successfully";
}else{
    echo "Database Not Connected";
}