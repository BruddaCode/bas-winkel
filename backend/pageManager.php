<?php
class pageManager {

	private $file = "";
	private $title = "";
	private $status = 0;

	public function __construct($route)
	{
		//echo $route;
		if(!isset($route) || strlen($route) == 0){
			$route = "HOME";
		}

		$config_page = json_decode(file_get_contents("backend/configuration/pages.json"))->PAGES;

		// Filter route input
		$route = preg_replace("/[^A-Za-z0-9 ]/", "", $route);
		$route = strtoupper($route);

		foreach ($config_page as $key => $value) {
			

			if($route == $value->ROUTE){
				$this->status = 200;
				$this->title = $value->TITLE;
				$this->file = $value->FILE;
				return;
			}
		}

		$this->title = "Page Not Found";
		$this->status = 404;
	}

	public function getPagePath(){

		if($this->status == 200){
			return "components/pages/" . $this->file . ".php";
		} else {
			return "components/pages/error/" . $this->status . ".php";
		}
		
	}
	public function getRouteTitle(){
		return $this->title;
	}

}
?>
