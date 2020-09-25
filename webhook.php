<?php

$method = $_SERVER['REQUEST_METHOD'];
//Proceso unicamente valido con el metodo post (dialogflow)
if($method == "POST"){
    $requestBody = file_get_contests('php://input');
    $json = json_decode($requestBody);
    //Extraemos el arreglo json y tomamos el parametro texto (text)
    $text = $json->queryResult->parameters->text;

    switch ($text){
        case 'hi':
            $speech= "Hi, Nice to meet you";
        break;

        case 'bye':
            $speech = 'Bye, good night';
        break;
        case 'anything':
            $speech = "yes, you can type anything here.";
        break;

        default:
        $speech = "ME has dejado sin palabras";
    break;
    }

    $response = new \stdClass();
    $response->speech = "";
    $response->displayText="";
    $response->source = "webhook";
    echo json_encode($response);
}else{
    echo "Error 782e#!"; //Error derivado del metodo incorrecto
}

?>