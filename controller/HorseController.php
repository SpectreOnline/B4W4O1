<?php
require(ROOT . "model/ManegeModel.php");

function addHorse(){
    render("horse/addHorse");
}

function store(){
    $data = $_POST;


    createHorse($data);

    render('horse/addHorse');
}

function deleteHorse($id) {
    $horse = getHorseById($id);

    render('horse/deleteHorse' , ['horse' => $horse]);

}

function destroyHorse($id) {
    deleteHorseById($id);

    header('Location:' . URL . 'home/index');
}


function editHorse($id){
    $horse = getHorseById($id);

    render('horse/editHorse' , ['horse' => $horse]);
}

function updateHorse() {
    $data = $_POST;

    updateHorseById($data);

    header('Location:' . URL  . 'home/index');
}