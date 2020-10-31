<?php
function array_have($eleme, $array){
    for($i = 0; $i < sizeof($array); $i++){
        if($i != 0){
            if($array[$i] == $eleme){
                return true;
            }
        }
    }
    return false;
}

function compareUri($uribase, $uricomp){
    $oldList = explode('/', $uribase);
    $newList = explode('/', $uricomp);
    $params = [];
    $uricompose = [];
    $result = [];

    if(sizeof($oldList) == sizeof($newList)){
       if(!array_have('', $newList)){

           for($i = 0 ; $i < sizeof($oldList); $i++){
               if(strpos($oldList[$i], ':') > -1){
                    array_push($params, $newList[$i]);
                    $newList[$i] = $oldList[$i];
               }
              
           }
            $result['bases'] = join('/', $oldList);
            $result['entered'] = join('/', $newList); 

           
           if(sizeof($params) > 0){
            $result['params'] = $params;
           }
           
       } else if($uribase == $uricomp){
            $result['bases'] = $uribase;
            $result['entered'] = $uribase;
           return $result;
       } else {
            return false;
       }
    } else {
        return false;
    }
    return $result; 
}

function parse($uri, $uri_comp){
    $diff = compareUri($uri, $uri_comp);
    return $diff;
}
?>