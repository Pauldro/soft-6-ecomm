<?php 
	class Family {
		public $famID;
		public $name1;
		public $name2;
		public $name3;
		public $longdesc;
		public $image;
		public $speca;
		public $specb;
		public $specc;
		public $specd;
		public $spece;
		public $specf;
		public $specg;
		public $spech;
		public $shortdesc;
		public $catid;
		public $tview;
		public $ftype;
		public $recno;
		public $schempic;
		public $width;
		public $height;
		public $name4;
		public $name5;
		public $dummy;
		
		public static function insert_family(Page $family, $debug) {
			$fam = new Family();
			$fam->famID = $family->name; 
			$fam->name1 = $family->title; 
			$fam->name2 = $family->name2; 
			$fam->name3 = $family->name3; 
			$fam->name4 = $family->name4; 
			$fam->name5 = $family->name5; 
			$fam->image = $family->imagetext; 
			$fam->longdesc = $family->longdesc; 
			$fam->speca = $family->speca; 
			$fam->specb = $family->specb; 
			$fam->specc = $family->specc; 
			$fam->specc = $family->specd; 
			$fam->spece = $family->spece; 
			$fam->specf = $family->specf; 
			$fam->spech = $family->spech; 
			$fam->shortdesc = $family->shortdesc; 
			$fam->tview = $family->tview; 
			$fam->schempic = $family->schematicimagename; 
			$fam->ftype = $family->ftype; 
			$fam->catid = $family->parent()->name;
			$fam->dummy = 'x';
			$fam->recno = get_familymaxrecnbr(false) + 1;
			
			$familyarray = (array)($fam);
			$familyarray = fillwithvalues($familyarray);
			
			
			if (!family_exists($family->name, false)) {
				return insert_family($familyarray, $debug);
			}
		}
		
	}
