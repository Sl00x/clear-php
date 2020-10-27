<?php
function get($id){
    if(array_key_exists($id, $_SESSION['get_data'])){
        return $_SESSION['get_data'][$id];
    } else {
        return 'none';
    }
}
function json($data){
    return json_decode(json_encode($data));
}

function show($id){
    if(array_key_exists($id, $_SESSION['get_data'])){
        echo $_SESSION['get_data'][$id];
    } else {
        echo 'none';
    }
}
?>