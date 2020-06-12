<?php
require(ROOT . "model/ManegeModel.php");


function index()
{
	$horses = getAllHorses();

	render("home/index", $horses);	
}