<?php

	class RevOperations extends UniteElementsBaseRev{
		
		/**
		 * 
		 * get button classes
		 */
		public function getButtonClasses(){
			
			$arrButtons = array(
				"red"=>"Red Button",
				"green"=>"Green Button",
				"blue"=>"Blue Button",
				"orange"=>"Orange Button",
				"darkgrey"=>"Darkgrey Button",
				"lightgrey"=>"Lightgrey Button",
			);
			
			return($arrButtons);
		}
		
		
		/**
		 * 
		 * get easing functions array
		 */
		public function getArrEasing($toAssoc = true){
			
			$arrEasing = array(
				"easeOutBack",
				"easeInQuad",
				"easeOutQuad",
				"easeInOutQuad",
				"easeInCubic",
				"easeOutCubic",
				"easeInOutCubic",
				"easeInQuart",
				"easeOutQuart",
				"easeInOutQuart",
				"easeInQuint",
				"easeOutQuint",
				"easeInOutQuint",
				"easeInSine",
				"easeOutSine",
				"easeInOutSine",
				"easeInExpo",
				"easeOutExpo",
				"easeInOutExpo",
				"easeInCirc",
				"easeOutCirc",
				"easeInOutCirc",
				"easeInElastic",
				"easeOutElastic",
				"easeInOutElastic",
				"easeInBack",
				"easeOutBack",
				"easeInOutBack",
				"easeInBounce",
				"easeOutBounce",
				"easeInOutBounce"
			);
			
			if($toAssoc)
				$arrEasing = UniteFunctionsRev::arrayToAssoc($arrEasing);
			
			return($arrEasing);
		}
		
		/**
		 * 
		 * get arr end easing
		 */
		public function getArrEndEasing(){
			$arrEasing = $this->getArrEasing(false);
			$arrEasing = array_merge(array("nothing"),$arrEasing);
			$arrEasing = UniteFunctionsRev::arrayToAssoc($arrEasing);
			$arrEasing["nothing"] = "No Change";
			
			return($arrEasing);
		}
		
		/**
		 * 
		 * get transition array
		 */
		public function getArrTransition(){
			
			$arrTransition = array(
				"random"=>"Random",
				"fade"=>"Fade",
				"slidehorizontal"=>"Slide Horizontal",
				"slidevertical"=>"Slide Vertical",
				"boxslide"=>"Box Slide",
				"boxfade"=>"Box Fade",
				"slotzoom-horizontal"=>"SlotZoom Horizontal",
				"slotslide-horizontal"=>"SlotSlide Horizontal",
				"slotfade-horizontal"=>"SlotFade Horizontal",
				"slotzoom-vertical"=>"SlotZoom Vertical",
				"slotslide-vertical"=>"SlotSlide Vertical",
				"slotfade-vertical"=>"SlotFade Vertical",
				"curtain-1"=>"Curtain 1",
				"curtain-2"=>"Curtain 2",
				"curtain-3"=>"Curtain 3",
				"slideleft"=>"Slide Left",
				"slideright"=>"Slide Right",			
				"slideup"=>"Slide Up",
				"slidedown"=>"Slide Down",
				"papercut"=>"Premium - Paper Cut",
				"3dcurtain-horizontal"=>"Premium - 3D Curtain Horizontal",
				"3dcurtain-vertical"=>"Premium - 3D Curtain Vertical",
				"flyin"=>"Premium - Fly In",
				"turnoff"=>"Premium - Turn Off",
				"cubic"=>"Premium - Cubic"
			);
						
			return($arrTransition);
		}
		
		
		/**
		 * 
		 * get random transition
		 */
		public static function getRandomTransition(){
			$arrTrans = self::getArrTransition();
			unset($arrTrans["random"]);
			$trans = array_rand($arrTrans);
			
			return($trans);
		}
		
		
		/**
		 * 
		 * get animations array
		 */
		public function getArrAnimations(){
			
			$arrAnimations = array(
				"fade"=>"Fade",
				"sft"=>"Short from Top",
				"sfb"=>"Short from Bottom",
				"sfr"=>"Short from Right",
				"sfl"=>"Short from Left",
				"lft"=>"Long from Top",
				"lfb"=>"Long from Bottom",
				"lfr"=>"Long from Right",
				"lfl"=>"Long from Left",
				"randomrotate"=>"Random Rotate"
			);
			
			return($arrAnimations);
		}
		
		/**
		 * 
		 * get "end" animations array
		 */
		public function getArrEndAnimations(){
			$arrAnimations = array(
				"auto"=>"Choose Automatic",
				"fadeout"=>"Fade Out",
				"stt"=>"Short to Top",
				"stb"=>"Short to Bottom",
				"stl"=>"Short to Left",
				"str"=>"Short to Right",
				"ltt"=>"Long to Top",
				"ltb"=>"Long to Bottom",
				"ltl"=>"Long to Left",
				"ltr"=>"Long to Right",
				"randomrotateout"=>"Random Rotate Out"
			);
			
			return($arrAnimations);
		}
		
		
		/**
		 * 
		 * parse css file and get the classes from there.
		 */
		public function getArrCaptionClasses($contentCSS){
			//parse css captions file
			$parser = new UniteCssParserRev();
			$parser->initContent($contentCSS);
			$arrCaptionClasses = $parser->getArrClasses();
			return($arrCaptionClasses);
		}
		
		/**
		 * 
		 * get the select classes html for putting in the html by ajax 
		 */
		private function getHtmlSelectCaptionClasses($contentCSS){
			$arrCaptions = $this->getArrCaptionClasses($contentCSS);
			$htmlSelect = UniteFunctionsRev::getHTMLSelect($arrCaptions,"","id='layer_caption' name='layer_caption'",true);
			return($htmlSelect);
		}
		
		/**
		 * 
		 * get contents of the css file
		 */
		public function getCaptionsContent(){
			$contentCSS = file_get_contents(GlobalsRevSlider::$filepath_captions);
			return($contentCSS);
		}
		
		
		/**
		 * 
		 * update captions css file content
		 * @return new captions html select 
		 */
		public function updateCaptionsContentData($content){
			$content = stripslashes($content);
			$content = trim($content);
			UniteFunctionsRev::writeFile($content, GlobalsRevSlider::$filepath_captions);
			
			//output captions array 
			$arrCaptions = $this->getArrCaptionClasses($content);
			return($arrCaptions);
		}
		
		/**
		 * 
		 * copy from original css file to the captions css.
		 */
		public function restoreCaptionsCss(){
			
			if(!file_exists(GlobalsRevSlider::$filepath_captions_original))
				UniteFunctionsRev::throwError("The original css file: captions_original.css doesn't exists.");
			
			$success = @copy(GlobalsRevSlider::$filepath_captions_original, GlobalsRevSlider::$filepath_captions);
			if($success == false)
				UniteFunctionsRev::throwError("Failed to restore from the original captions file.");
		}
		
		/**
		 * 
		 * preview slider output
		 * if output object is null - create object
		 */
		public function previewOutput($sliderID,$output = null){
			
			if($output == null)
				$output = new RevSliderOutput();
			
			$output->setPreviewMode();
			
			//put the output html
			$urlPlugin = RevSliderAdmin::$url_plugin."rs-plugin/";
			
			?>
				<html>
					<head>
						<link rel='stylesheet' href='<?php echo $urlPlugin?>css/settings.css' type='text/css' media='all' />
						<link rel='stylesheet' href='<?php echo $urlPlugin?>css/captions.css' type='text/css' media='all' />
						<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
						<script type='text/javascript' src='<?php echo $urlPlugin?>js/jquery.themepunch.plugins.min.js'></script>
						<script type='text/javascript' src='<?php echo $urlPlugin?>js/jquery.themepunch.revolution.js'></script>
					</head>
					<body style="padding:0px;margin:0px;">
						<?php
							$output->putSliderBase($sliderID);		 
						?>
					</body>
				</html>
			<?php 
			exit();
		}
		
		
		/**
		 * 
		 * put slide preview by data
		 */
		public function putSlidePreviewByData($data){
			
			
			$data = stripslashes($data);
			$data = json_decode($data);
			$data = (array)$data;
			$slideID = $data["slideid"];
			$slide = new RevSlide();
			$slide->initByID($slideID);
			$sliderID = $slide->getSliderID();
			
			$output = new RevSliderOutput();
			$output->setOneSlideMode($data);
			
			$this->previewOutput($sliderID,$output);
		}
		
		
		
	}

?>