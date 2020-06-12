<?php
require(ROOT . "model/PlanningModel.php");
require(ROOT . "model/VisitorModel.php");
require(ROOT . "model/ManegeModel.php");

function addPlanning(){
    render("planning/addPlanning");
}

function store(){
    $data = $_POST;


    createPlanning($data);

    render('planning/addPlanning');
}

function deletePlanning($id) {
    $planning = getPlanningById($id);

    render('planning/deletePlanning' , ['planning' => $planning]);

}

function destroyPlanning($id) {
    deletePlanningById($id);

    header('Location:' . URL . 'home/index');
}


function editPlanning($id){
    $Planning = getPlanningById($id);

    render('planning/editPlanning' , ['planning' => $planning]);
}

function updatePlanning() {
    $data = $_POST;

    updatePlanningById($data);

    header('Location:' . URL  . 'home/index');
}

function planningIndex(){
    render('planning/planningIndex');
}