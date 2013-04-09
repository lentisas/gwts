<?php 
class View_Controller extends Base_Controller {
	public $restful = true; 

	public function get_home(){
		return View::make("home.index");
	}

	public function get_lmcc(){
		return View::make("lmccs.index");
	}	
	
}