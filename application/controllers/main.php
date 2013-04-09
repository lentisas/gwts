<?php

class Main_Controller extends Base_Controller {

	public $restful = true;

	//Controllers for users
	public function post_user(){
		return Response::json(User::create_user(Input::json()));
	}
	public function put_user(){		
		return Response::json(User::update_user(Input::json()));
	}
	public function delete_user($num){
		return Response::json(User::delete_user($num));
	}
	public function get_users(){
		return Response::json(User::get_users(Input::all()));
	}

	//Controllers for companytypes
	public function post_companytype(){
		return Response::json(CompanyType::create_company_type(Input::json()));
	}
	public function put_companytype(){		
		return Response::json(CompanyType::update_company_type(Input::json()));
	}
	public function delete_companytype($num){
		return Response::json(CompanyType::delete_company_type($num));
	}
	public function get_companytypes(){
		return Response::json(CompanyType::get_company_types(Input::all()));
	}

	//Controllers for companies
	public function post_company(){
		return Response::json(Company::create_company(Input::json()));
	}
	public function put_company(){		
		return Response::json(Company::update_company(Input::json()));
	}
	public function delete_company($num){
		return Response::json(Company::delete_company($num));
	}
	public function get_companies(){
		return Response::json(Company::get_companies(Input::all()));
	}

	//Controllers for forestdistricts
	public function post_forestdistrict(){
		return Response::json(ForestDistrict::create_forest_district(Input::json()));
	}
	public function put_forestdistrict(){		
		return Response::json(ForestDistrict::update_forest_district(Input::json()));
	}
	public function delete_forestdistrict($num){
		return Response::json(ForestDistrict::delete_forest_district($num));
	}
	public function get_forestdistricts(){
		return Response::json(ForestDistrict::get_forest_districts(Input::all()));
	}

	//Controllers for lifs
	public function post_lif(){
		return Response::json(Lif::create_lif(Input::json()));
	}
	public function put_lif(){		
		return Response::json(Lif::update_lif(Input::json()));
	}
	public function delete_lif($num){
		return Response::json(Lif::delete_lif($num));
	}
	public function get_lifs(){
		return Response::json(Lif::get_lifs(Input::all()));
	}

	//Controllers for lifdetails
	public function post_lifdetail(){
		return Response::json(LifDetail::create_lif_details(Input::json()));
	}
	public function put_lifdetail(){		
		return Response::json(LifDetail::update_lif_details(Input::json()));
	}
	public function delete_lifdetail($num){
		return Response::json(LifDetail::delete_lif_details($num));
	}
	public function get_lifdetails(){
		return Response::json(LifDetail::get_lif_details(Input::all()));
	}


	//Controllers for lmccs
	public function post_lmcc(){
		return Response::json(Lmcc::create_lmcc(Input::json()));
	}
	public function put_lmcc(){		
		return Response::json(Lmcc::update_lmcc(Input::json()));
	}
	public function delete_lmcc($num){
		return Response::json(Lmcc::delete_lmcc($num));
	}
	public function get_lmccs(){
		return Response::json(Lmcc::get_lmccs(Input::all()));
	}

	//Controllers for lmcc_details
	public function post_lmccdetail(){
		return Response::json(LmccDetail::create_lmcc_details(Input::json()));
	}
	public function put_lmccdetail(){		
		return Response::json(LmccDetail::update_lmcc_details(Input::json()));
	}
	public function delete_lmccdetail($num){
		return Response::json(LmccDetail::delete_lmcc_details($num));
	}
	public function get_lmccdetails(){
		return Response::json(LmccDetail::get_lmcc_details(Input::all()));
	}

	//Controllers for regions
	public function post_region(){
		return Response::json(Region::create_region(Input::json()));
	}
	public function put_region(){		
		return Response::json(Region::update_region(Input::json()));
	}
	public function delete_region($num){
		return Response::json(Region::delete_region($num));
	}
	public function get_regions(){
		return Response::json(Region::get_regions(Input::all()));
	}

	//Controllers for species
	public function post_specie(){
		return Response::json(Specie::create_specie(Input::json()));
	}
	public function put_specie(){		
		return Response::json(Specie::update_specie(Input::json()));
	}
	public function delete_specie($num){
		return Response::json(Specie::delete_specie($num));
	}
	public function get_species(){
		return Response::json(Specie::get_species(Input::all()));
	}

	//Controllers for tifs
	public function post_tif(){
		return Response::json(Tif::create_tif(Input::json()));
	}
	public function put_tif(){		
		return Response::json(Tif::update_tif(Input::json()));
	}
	public function delete_tif($num){
		return Response::json(Tif::delete_tif($num));
	}
	public function get_tifs(){
		return Response::json(Tif::get_tifs(Input::all()));
	}

	//Controllers for tifdetails
	public function post_tifdetail(){
		return Response::json(TifDetail::create_tif_details(Input::json()));
	}
	public function put_tifdetail(){		
		return Response::json(TifDetail::update_tif_details(Input::json()));
	}
	public function delete_tifdetail($num){
		return Response::json(TifDetail::delete_tif_details($num));
	}
	public function get_tifdetails(){
		return Response::json(TifDetail::get_tif_details(Input::all()));
	}

	//Controllers for tucs
	public function post_tuc(){
		return Response::json(Tuc::create_tuc(Input::json()));
	}
	public function put_tuc(){		
		return Response::json(Tuc::update_tuc(Input::json()));
	}
	public function delete_tuc($num){
		return Response::json(Tuc::delete_tuc($num));
	}
	public function get_tucs(){
		return Response::json(Tuc::get_tucs(Input::all()));
	}

}