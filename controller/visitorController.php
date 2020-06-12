<?php
require(ROOT . "model/VisitorModel.php");

function addVisitor(){
    render("visitor/addVisitor");
}

function store(){
    $data = $_POST;


    createVisitor($data);

    render('visitor/addVisitor');
}

function deleteVisitor($id) {
    $Visitor = getVisitorById($id);

    render('visitor/deleteVisitor' , ['visitor' => $Visitor]);

}

function destroyVisitor($id) {
    deleteVisitorById($id);

    header('Location:' . URL . 'home/index');
}


function editVisitor($id){
    $Visitor = getVisitorById($id);

    render('visitor/editVisitor' , ['visitor' => $Visitor]);
}

function updateVisitor() {
    $data = $_POST;

    updateVisitorById($data);

    header('Location:' . URL  . 'home/index');
}

function visitorIndex(){
    render('visitor/visitorIndex');
}