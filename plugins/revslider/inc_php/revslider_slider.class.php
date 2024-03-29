<?php

	class RevSlider extends UniteElementsBaseRev{
		
		const VALIDATE_NUMERIC = "numeric";
		const VALIDATE_EMPTY = "empty";
		
		
		private $id;
		private $title;
		private $alias;
		private $arrParams;
		private $arrSlides = null;
		
		public function __construct(){
			parent::__construct();
		}
		
		/**
		 * 
		 * validate that the slider is inited. if not - throw error
		 */
		private function validateInited(){
			if(empty($this->id))
				UniteFunctionsRev::throwError("The slider is not inited!");
		}
		
		/**
		 * 
		 * init slider by db data
		 * 
		 */
		public function initByDBData($arrData){
			
			$this->id = $arrData["id"];
			$this->title = $arrData["title"];
			$this->alias = $arrData["alias"];
			
			$params = $arrData["params"];
			$params = (array)json_decode($params);
			
			$this->arrParams = $params;
		}
		
		
		/**
		 * 
		 * init the slider object by database id
		 */
		public function initByID($sliderID){
			UniteFunctionsRev::validateNumeric($sliderID,"Slider ID");
			$sliderID = $this->db->escape($sliderID);
			
			try{
				$sliderData = $this->db->fetchSingle(GlobalsRevSlider::$table_sliders,"id=$sliderID");
			}catch(Exception $e){
				UniteFunctionsRev::throwError("Slider with ID: $sliderID Not Found");
			}
			
			$this->initByDBData($sliderData);
		}

		/**
		 * 
		 * init slider by alias
		 */
		public function initByAlias($alias){
			$alias = $this->db->escape($alias);

			try{
				$sliderData = $this->db->fetchSingle(GlobalsRevSlider::$table_sliders,"alias='$alias'");
			}catch(Exception $e){
				UniteFunctionsRev::throwError("Slider with alias <strong>$alias</strong> not found.");
			}
			
			$this->initByDBData($sliderData);
		}
		
		
		/**
		 * 
		 * init by id or alias
		 */
		public function initByMixed($mixed){
			if(is_numeric($mixed))
				$this->initByID($mixed);
			else
				$this->initByAlias($mixed);
		}
		
		
		/**
		 * 
		 * get data functions
		 */
		public function getTitle(){
			return($this->title);
		}
		
		public function getID(){
			return($this->id);
		}
		
		public function getParams(){
			return($this->arrParams);
		}
		
		/**
		 * 
		 * set slider params
		 */
		public function setParams($arrParams){
			$this->arrParams = $arrParams;
		}
		
		/**
		 * 
		 * get parameter from params array. if no default, then the param is a must!
		 */
		function getParam($name,$default=null,$validateType = null,$title=""){
			
			if($default === null){
				if(!array_key_exists($name, $this->arrParams))
					UniteFunctionsRev::throwError("The param <b>$name</b> not found in slider params.");
				
				$default = "";
			}
			
			$value = UniteFunctionsRev::getVal($this->arrParams, $name,$default);
						
			//validation:
			switch($validateType){
				case self::VALIDATE_NUMERIC:
				case self::VALIDATE_EMPTY:
					$paramTitle = !empty($title)?$title:$name;
					if(empty($value))
						UniteFunctionsRev::throwError("The param <strong>$paramTitle</strong> should not be empty.");
				break;
				case self::VALIDATE_NUMERIC:
					$paramTitle = !empty($title)?$title:$name;
					if(is_numeric($value))
						UniteFunctionsRev::throwError("The param <strong>$paramTitle</strong> should be numeric. Now it's: $value");
				break;
			}
			
			return $value;
		}
		
		public function getAlias(){
			return($this->alias);
		}
		
		/**
		 * get combination of title (alias)
		 */
		public function getShowTitle(){
			$showTitle = $this->title." ($this->alias)";
			return($showTitle);
		}
		
		/**
		 * 
		 * get slider shortcode
		 */
		public function getShortcode(){
			$shortCode = "[rev_slider {$this->alias}]";
			return($shortCode);
		}
		
		
		/**
		 * 
		 * check if alias exists in DB
		 */
		private function isAliasExistsInDB($alias){
			$alias = $this->db->escape($alias);
			
			$where = "alias='$alias'";
			if(!empty($this->id))
				$where .= " and id != '{$this->id}'";
			
			$response = $this->db->fetch(GlobalsRevSlider::$table_sliders,$where);
			return(!empty($response));
			
		}
		
		
		/**
		 * 
		 * validate settings for add
		 */
		private function validateInputSettings($title,$alias,$params){
			UniteFunctionsRev::validateNotEmpty($title,"title");
			UniteFunctionsRev::validateNotEmpty($alias,"alias");
			
			if($this->isAliasExistsInDB($alias))
				UniteFunctionsRev::throwError("Some other slider with alias '$alias' already exists");
		}
		
		
		/**
		 * 
		 * create / update slider from options
		 */
		private function createUpdateSliderFromOptions($options,$sliderID = null){
			
			$arrMain = UniteFunctionsRev::getVal($options, "main");
			$params = UniteFunctionsRev::getVal($options, "params");
			
			//trim all input data
			$arrMain = UniteFunctionsRev::trimArrayItems($arrMain);
			$params = UniteFunctionsRev::trimArrayItems($params);
			
			$params = array_merge($arrMain,$params);
			
			$title = UniteFunctionsRev::getVal($arrMain, "title");
			$alias = UniteFunctionsRev::getVal($arrMain, "alias");
			
			if(!empty($sliderID))
				$this->initByID($sliderID);
				
			$this->validateInputSettings($title, $alias, $params);
			
			$jsonParams = json_encode($params);
			
			//insert slider to database
			$arrData = array();
			$arrData["title"] = $title;
			$arrData["alias"] = $alias;
			$arrData["params"] = $jsonParams;
			
			if(empty($sliderID)){	//create slider	
				$sliderID = $this->db->insert(GlobalsRevSlider::$table_sliders,$arrData);
				return($sliderID);
				
			}else{	//update slider
				$this->initByID($sliderID);
				
				$sliderID = $this->db->update(GlobalsRevSlider::$table_sliders,$arrData,array("id"=>$sliderID));				
			}
		}
		
		/**
		 * 
		 * delete slider from datatase
		 */
		private function deleteSlider(){			
			
			$this->validateInited();
			
			//delete slider
			$this->db->delete(GlobalsRevSlider::$table_sliders,"id=".$this->id);
			
			//delete slides
			$this->deleteAllSlides();
		}

		/**
		 * 
		 * delete all slides
		 */
		private function deleteAllSlides(){
			$this->validateInited();
			
			$this->db->delete(GlobalsRevSlider::$table_slides,"slider_id=".$this->id);			
		}
		
		
		/**
		 * 
		 * duplicate slider in datatase
		 */
		private function duplicateSlider(){			
			
			$this->validateInited();
			
			//get slider number:
			$response = $this->db->fetch(GlobalsRevSlider::$table_sliders);
			$numSliders = count($response);
			$newSliderSerial = $numSliders+1;
			
			$newSliderTitle = "Slider".$newSliderSerial;
			$newSliderAlias = "slider".$newSliderSerial;
			
			//insert a new slider
			$sqlSelect = "select ".GlobalsRevSlider::FIELDS_SLIDER." from ".GlobalsRevSlider::$table_sliders." where id={$this->id}";
			$sqlInsert = "insert into ".GlobalsRevSlider::$table_sliders." (".GlobalsRevSlider::FIELDS_SLIDER.") ($sqlSelect)";
						
			$this->db->runSql($sqlInsert);
			$lastID = $this->db->getLastInsertID();
			UniteFunctionsRev::validateNotEmpty($lastID);
			
			//update the new slider with the title and the alias values
			$arrUpdate = array();
			$arrUpdate["title"] = $newSliderTitle;
			$arrUpdate["alias"] = $newSliderAlias;
			$this->db->update(GlobalsRevSlider::$table_sliders, $arrUpdate, array("id"=>$lastID));
			
			//duplicate slides
			$fields_slide = GlobalsRevSlider::FIELDS_SLIDE;
			$fields_slide = str_replace("slider_id", $lastID, $fields_slide);
			
			$sqlSelect = "select ".$fields_slide." from ".GlobalsRevSlider::$table_slides." where slider_id={$this->id}";
			$sqlInsert = "insert into ".GlobalsRevSlider::$table_slides." (".GlobalsRevSlider::FIELDS_SLIDE.") ($sqlSelect)";
			
			$this->db->runSql($sqlInsert);
		}
		
		
		
		/**
		 * 
		 * duplicate slide
		 */
		private function duplicateSlide($slideID){
			$slide = new RevSlide();
			$slide->initByID($slideID);
			$order = $slide->getOrder();
			$slides = $this->getSlides();
			$newOrder = $order+1;
			$this->shiftOrder($newOrder);
			
			//do duplication
			$sqlSelect = "select ".GlobalsRevSlider::FIELDS_SLIDE." from ".GlobalsRevSlider::$table_slides." where id={$slideID}";
			$sqlInsert = "insert into ".GlobalsRevSlider::$table_slides." (".GlobalsRevSlider::FIELDS_SLIDE.") ($sqlSelect)";
			
			$this->db->runSql($sqlInsert);
			$lastID = $this->db->getLastInsertID();
			UniteFunctionsRev::validateNotEmpty($lastID);
			
			//update order
			$arrUpdate = array("slide_order"=>$newOrder);
			
			$this->db->update(GlobalsRevSlider::$table_slides,$arrUpdate, array("id"=>$lastID));
		}
		
		
		/**
		 * 
		 * shift order of the slides from specific order
		 */
		private function shiftOrder($fromOrder){
			
			$where = " slider_id={$this->id} and slide_order >= $fromOrder";
			$sql = "update ".GlobalsRevSlider::$table_slides." set slide_order=(slide_order+1) where $where";
			$this->db->runSql($sql);
			
		}
		
		
		/**
		 * 
		 * create slider in database from options
		 */
		public function createSliderFromOptions($options){
			$sliderID = $this->createUpdateSliderFromOptions($options);
			return($sliderID);			
		}
		
		
		/**
		 * 
		 * export slider from data, output a file for download
		 */
		public function exportSlider(){
			$this->validateInited();
			
			$sliderParams = $this->getParamsForExport();
			$arrSlides = $this->getSlidesForExport();
			
			$arrSliderExport = array("params"=>$sliderParams,"slides"=>$arrSlides);
			
			$strExport = serialize($arrSliderExport);
			
			if(!empty($this->alias))
				$filename = $this->alias.".txt";
			else
				$filename = "slider_export.txt";
			
			UniteFunctionsRev::downloadFile($strExport,$filename);
		}
		
		
		/**
		 * 
		 * import slider from multipart form
		 */
		public function importSliderFromPost(){
			
			try{
			
					$sliderID = UniteFunctionsRev::getPostVariable("sliderid");
					$this->initByID($sliderID);
					$filepath = $_FILES["import_file"]["tmp_name"];
					
					if(file_exists($filepath) == false)
						UniteFunctionsRev::throwError("Import file not found!!!");
						
					//get content array
					$content = @file_get_contents($filepath);			
					$arrSlider = @unserialize($content);
					if(empty($arrSlider))
						 UniteFunctionsRev::throwError("Wrong export slider file format!");
					
					//update slider params
					
					$sliderParams = $arrSlider["params"];
					$sliderParams["title"] = $this->arrParams["title"];
					$sliderParams["alias"] = $this->arrParams["alias"];
					$sliderParams["shortcode"] = $this->arrParams["shortcode"];
					
					if(isset($sliderParams["background_image"]))
						$sliderParams["background_image"] = UniteFunctionsWPRev::getImageUrlFromPath($sliderParams["background_image"]);
					
					$json_params = json_encode($sliderParams);
					$arrUpdate = array("params"=>$json_params);
					$this->db->update(GlobalsRevSlider::$table_sliders,$arrUpdate,array("id"=>$sliderID));
					
					//-------- Slides Handle -----------
					
					//delete current slides
					$this->deleteAllSlides();
					
					//create all slides
					$arrSlides = $arrSlider["slides"];
					foreach($arrSlides as $slide){
						
						$params = $slide["params"];
						$layers = $slide["layers"];
						
						//convert params images:
						if(isset($params["image"]))
							$params["image"] = UniteFunctionsWPRev::getImageUrlFromPath($params["image"]);
						
						//convert layers images:
						foreach($layers as $key=>$layer){					
							if(isset($layer["image_url"])){
								$layer["image_url"] = UniteFunctionsWPRev::getImageUrlFromPath($layer["image_url"]);
								$layers[$key] = $layer;
							}
						}
						
						//create new slide
						$arrCreate = array();
						$arrCreate["slider_id"] = $sliderID;
						$arrCreate["slide_order"] = $slide["slide_order"];				
						$arrCreate["layers"] = json_encode($layers);
						$arrCreate["params"] = json_encode($params);
						
						$this->db->insert(GlobalsRevSlider::$table_slides,$arrCreate);									
					}

			}catch(Exception $e){
				$errorMessage = $e->getMessage();
				return(array("success"=>false,"error"=>$errorMessage,"sliderID"=>$sliderID));
			}
			
			return(array("success"=>true,"sliderID"=>$sliderID));
		}
		
		
		/**
		 * 
		 * update slider from options
		 */
		public function updateSliderFromOptions($options){
			
			$sliderID = UniteFunctionsRev::getVal($options, "sliderid");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			
			$this->createUpdateSliderFromOptions($options,$sliderID);
		}
		
		
		/**
		 * 
		 * delete slider from input data
		 */
		public function deleteSliderFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			$this->deleteSlider();
		}

		
		/**
		 * 
		 * delete slider from input data
		 */
		public function duplicateSliderFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			$this->duplicateSlider();
		}
		
		
		/**
		 * 
		 * duplicate slide from input data
		 */
		public function duplicateSlideFromData($data){
			
			//init the slider
			$sliderID = UniteFunctionsRev::getVal($data, "sliderID");
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			$this->initByID($sliderID);
			
			//get the slide id
			$slideID = UniteFunctionsRev::getVal($data, "slideID");
			UniteFunctionsRev::validateNotEmpty($slideID,"Slide ID");
			$this->duplicateSlide($slideID);
			
			return($sliderID);
		}
		
		
		/**
		 * 
		 * create a slide from input data
		 */
		public function createSlideFromData($data){
			
			$sliderID = UniteFunctionsRev::getVal($data, "sliderid");
			$urlImage = UniteFunctionsRev::getVal($data, "url_image");
			
			UniteFunctionsRev::validateNotEmpty($sliderID,"Slider ID");
			UniteFunctionsRev::validateNotEmpty($urlImage,"image url");
			$this->initByID($sliderID);
						
			$slide = new RevSlide();
			$slideID = $slide->createSlide($sliderID, $urlImage);
			return($slideID);
		}
		
		/**
		 * 
		 * update slides order from data
		 */
		public function updateSlidesOrderFromData($data){
			$sliderID = UniteFunctionsRev::getVal($data, "sliderID");
			$arrIDs = UniteFunctionsRev::getVal($data, "arrIDs");
			UniteFunctionsRev::validateNotEmpty($arrIDs,"slides");
			
			$this->initByID($sliderID);
			
			foreach($arrIDs as $index=>$slideID){
				$order = $index+1;
				$arrUpdate = array("slide_order"=>$order);
				$where = array("id"=>$slideID);
				$this->db->update(GlobalsRevSlider::$table_slides,$arrUpdate,$where);
			}
			
		}
		
		/**
		 * 
		 * get the "main" and "settings" arrays, for dealing with the settings.
		 */
		public function getSettingsFields(){
			$this->validateInited();
			
			$arrMain = array();
			$arrMain["title"] = $this->title;
			$arrMain["alias"] = $this->alias;
			
			$arrRespose = array("main"=>$arrMain,
								"params"=>$this->arrParams);
			
			return($arrRespose);
		}
		
		
		/**
		 * 
		 * get slides of the current slider
		 */
		public function getSlides(){
			$this->validateInited();
			
			$arrSlides = array();
			$arrSlideRecords = $this->db->fetch(GlobalsRevSlider::$table_slides,"slider_id=".$this->id,"slide_order");
			
			foreach ($arrSlideRecords as $record){
				$slide = new RevSlide();
				$slide->initByData($record);
				$arrSlides[] = $slide;
			}
			
			$this->arrSlides = $arrSlides;
			
			return($arrSlides);
		}
		
		/**
		 * 
		 * get array of slide names
		 */
		public function getArrSlideNames(){
			if(empty($this->arrSlides))
				$this->getSlides();
			
			$arrSlideNames = array();
			
			foreach($this->arrSlides as $number=>$slide){
				$slideID = $slide->getID();
				$filename = $slide->getImageFilename();
				$arrSlideNames[$slideID] = "Slide ".($number+1)." ($filename)";				
			}
			return($arrSlideNames);
		}
		
		
		/**
		 * 
		 * get array of slides numbers by id's
		 */
		public function getSlidesNumbersByIDs(){
			
			if(empty($this->arrSlides))
				$this->getSlides();
				
			$arrSlideNumbers = array();
			
			foreach($this->arrSlides as $number=>$slide){
				$slideID = $slide->getID();
				$arrSlideNumbers[$slideID] = ($number+1);				
			}
			return($arrSlideNumbers);
		}
		
		
		/**
		 * 
		 * get slider params for export slider
		 */
		private function getParamsForExport(){
			$exportParams = $this->arrParams;
			unset($exportParams["title"]);
			unset($exportParams["alias"]);
			unset($exportParams["shortcode"]);
			
			//modify background image
			$urlImage = UniteFunctionsRev::getVal($exportParams, "background_image");
			if(!empty($urlImage))
				$exportParams["background_image"] = $urlImage;
			
			return($exportParams);
		}

		
		/**
		 * 
		 * get slides for export
		 */
		private function getSlidesForExport(){
			$arrSlides = $this->getSlides();
			$arrSlidesExport = array();
			foreach($arrSlides as $slide){
				$slideNew = array();
				$slideNew["params"] = $slide->getParamsForExport();
				$slideNew["slide_order"] = $slide->getOrder();
				$slideNew["layers"] = $slide->getLayersForExport();
				$arrSlidesExport[] = $slideNew;
			}
			
			return($arrSlidesExport);
		}
		
		
		/**
		 * 
		 * get slides number
		 */
		public function getNumSlides(){
			if($this->arrSlides == null)
				$this->getSlides();
			
			$numSlides = count($this->arrSlides);
			return($numSlides);
		}
		
		
		/**
		 * 
		 * get sliders array - function don't belong to the object!
		 */
		public function getArrSliders(){
			
			$response = $this->db->fetch(GlobalsRevSlider::$table_sliders,"","id");
			
			$arrSliders = array();
			foreach($response as $arrData){
				$slider = new RevSlider();
				$slider->initByDBData($arrData);
				$arrSliders[] = $slider;
			}
			
			return($arrSliders);
		}
		
		/**
		 * 
		 * get array of slider id -> title
		 */		
		public function getArrSlidersShort(){
			$arrSliders = $this->getArrSliders();
			$arrShort = array();
			foreach($arrSliders as $slider){
				$id = $slider->getID();
				$title = $slider->getTitle();
				$arrShort[$id] = $title;
			}
			return($arrShort);
		}
		
		/**
		 * 
		 * get max order
		 */
		public function getMaxOrder(){
			$this->validateInited();
			$maxOrder = 0;
			$arrSlideRecords = $this->db->fetch(GlobalsRevSlider::$table_slides,"slider_id=".$this->id,"slide_order desc","","limit 1");
			if(empty($arrSlideRecords))
				return($maxOrder);
			$maxOrder = $arrSlideRecords[0]["slide_order"];
			
			return($maxOrder);
		}
				
		
	}

?>