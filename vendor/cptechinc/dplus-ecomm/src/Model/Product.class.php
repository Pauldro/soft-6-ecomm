<?php 
	class Product {
		public $sessionid;
		public $recordno;
		public $date;
		public $time;
		public $itemid;
		public $price;
		public $qty;
		public $priceqty1;
		public $priceqty2;
		public $priceqty3; 
		public $priceqty4; 
		public $priceqty5; 
		public $priceqty6; 
		public $priceprice1; 
		public $priceprice2; 
		public $priceprice3; 
		public $priceprice4; 
		public $priceprice5; 
		public $priceprice6; 
		public $unit; 
		public $listprice; 
		public $name1; 
		public $name2; 
		public $shortdesc;
		public $image; 
		public $familyid; 
		public $ermes; 
		public $speca; 
		public $specb; 
		public $specc; 
		public $specd; 
		public $spece; 
		public $specf; 
		public $specg; 
		public $spech; 
		public $longdesc;
		public $orderno; 
		public $name3; 
		public $name4; 
		public $thumb; 
		public $width; 
		public $height; 
		public $productdes; 
		public $keywords; 
		public $vpn; 
		public $uomdesc; 
		public $vidinffg; 
		public $vidinflk; 
		public $additemflag; 
		public $schemafam; 
		public $prop65; 
		public $leadfree; 
		public $dummy;
		
		public static function makeproductfromim($productarray) {
			if (wire('pages')->get('template=product-page,itemid='.$productarray['itemid'])) {
				return false;
			}
			$p = new Page();
			$p->template = 'product-page';
			$p->parent = wire('pages')->get('name='.$productarray['familyid']);
			$p->name = wire('sanitizer')->name($productarray['name1']);
			$p->title = $productarray['name1'];
			$p->familyid = $productarray['familyid'];
			$p->schemafam = $productarray['schemafam'];
			$p->itemid = $productarray['itemid'];
			$p->name1 = $productarray['name1'];
			$p->name2 = $productarray['name2'];
			$p->name3 = $productarray['name3'];
			$p->name4 = $productarray['name4'];
			$p->unit = $productarray['unit'];
			$p->uofmdesc = $productarray['uomdesc'];
			$p->price = $productarray['price'];
			$p->listprice = $productarray['listprice'];
			$p->keywords = $productarray['keywords'];
			$p->vpn = $productarray['vpn'];
			$p->youtubelink = $productarray['vidinflk'];
			$p->shortdesc = $productarray['shortdesc'];
			$p->longdesc = $productarray['longdesc'];
			
			$p->speca = $productarray['speca']; 
			$p->specb = $productarray['specb']; 
			$p->specc = $productarray['specc'];  
			$p->specd = $productarray['specd'];  
			$p->spece = $productarray['spece'];  
			$p->specf = $productarray['specf']; 
			$p->specg = $productarray['specg']; 
			$p->spech = $productarray['spech']; 
			
			$p->additemflag = $productarray['additemflag'];
			$p->prop65 = $productarray['prop65'];
			$p->leadfree = $productarray['leadfree'];
			
			$p->priceqty1 = $productarray['priceqty1'];
			$p->priceqty2 = $productarray['priceqty2'];
			$p->priceqty3 = $productarray['priceqty3'];
			$p->priceqty4 = $productarray['priceqty4']; 
			$p->priceqty5 = $productarray['priceqty5'];
			$p->priceqty6 = $productarray['priceqty6'];
			$p->priceprice1 = $productarray['priceprice1']; 
			$p->priceprice2 = $productarray['priceprice2'];  
			$p->priceprice3 = $productarray['priceprice3'];  
			$p->priceprice4 = $productarray['priceprice4']; 
			$p->priceprice5 = $productarray['priceprice5']; 
			$p->priceprice6 = $productarray['priceprice6'];  
			
			$p->save();
			$p->product_image = '/var/www/html/img/'.$productarray['image']; 
			$p->save();
		}
		
		public static function updateproductfromim($productarray) {
			$p = wire('pages')->get('template=product-page,itemid='.$productarray['itemid']);
			if (!$p) {
				return false;
			}
			$p->of(false);
			$p->parent = wire('pages')->get('name='.$productarray['familyid']);
			$p->name = wire('sanitizer')->name($productarray['name1']);
			$p->title = $productarray['name1'];
			$p->familyid = $productarray['familyid'];
			$p->schemafam = $productarray['schemafam'];
			$p->itemid = $productarray['itemid'];
			$p->name1 = $productarray['name1'];
			$p->name2 = $productarray['name2'];
			$p->name3 = $productarray['name3'];
			$p->name4 = $productarray['name4'];
			$p->unit = $productarray['unit'];
			$p->uofmdesc = $productarray['uomdesc'];
			$p->price = $productarray['price'];
			$p->listprice = $productarray['listprice'];
			$p->keywords = $productarray['keywords'];
			$p->vpn = $productarray['vpn'];
			$p->youtubelink = $productarray['vidinflk'];
			$p->shortdesc = $productarray['shortdesc'];
			$p->longdesc = $productarray['longdesc'];
			
			$p->speca = $productarray['speca']; 
			$p->specb = $productarray['specb']; 
			$p->specc = $productarray['specc'];  
			$p->specd = $productarray['specd'];  
			$p->spece = $productarray['spece'];  
			$p->specf = $productarray['specf']; 
			$p->specg = $productarray['specg']; 
			$p->spech = $productarray['spech']; 
			
			$p->additemflag = $productarray['additemflag'];
			$p->prop65 = $productarray['prop65'];
			$p->leadfree = $productarray['leadfree'];
			
			$p->priceqty1 = $productarray['priceqty1'];
			$p->priceqty2 = $productarray['priceqty2'];
			$p->priceqty3 = $productarray['priceqty3'];
			$p->priceqty4 = $productarray['priceqty4']; 
			$p->priceqty5 = $productarray['priceqty5'];
			$p->priceqty6 = $productarray['priceqty6'];
			$p->priceprice1 = $productarray['priceprice1']; 
			$p->priceprice2 = $productarray['priceprice2'];  
			$p->priceprice3 = $productarray['priceprice3'];  
			$p->priceprice4 = $productarray['priceprice4']; 
			$p->priceprice5 = $productarray['priceprice5']; 
			$p->priceprice6 = $productarray['priceprice6'];  
			
			$p->save();
			$p->product_image = '/var/www/html/img/'.$productarray['image']; 
			$p->save();
		}
		
		public static function insert_product(Page $product, $debug) {
			$item = new Product();
			$item->sessionid = '1';
			$item->recordno = get_immaxrecnbr(false) + 1;
			$item->date = date('Ymd');
			$item->time = date('His');
			$item->itemid = $product->itemid;
			$item->price = $product->price;
			$item->qty = '';
			$item->priceqty1 = $product->priceqty1;
			$item->priceqty2 = $product->priceqty2;
			$item->priceqty3 = $product->priceqty3;
			$item->priceqty4 = $product->priceqty4; 
			$item->priceqty5 = $product->priceqty5;
			$item->priceqty6 = $product->priceqty6;
			$item->priceprice1 = $product->priceprice1; 
			$item->priceprice2 = $product->priceprice2;  
			$item->priceprice3 = $product->priceprice3;  
			$item->priceprice4 = $product->priceprice4; 
			$item->priceprice5 = $product->priceprice5; 
			$item->priceprice6 = $product->priceprice6;  
			$item->unit = $product->unit; 
			$item->listprice = $product->listprice; 
			$item->name1 = $product->title; 
			$item->name2 = $product->name2; 
			$item->shortdesc = $product->shortdesc;
			$item->image = $product->imagetext; 
			$item->familyid = $product->familyid; 
			$item->ermes = ''; 
			$item->speca = $product->speca; 
			$item->specb = $product->specb; 
			$item->specc = $product->specc;  
			$item->specd = $product->specd;  
			$item->spece = $product->spece;  
			$item->specf = $product->specf; 
			$item->specg = $product->specg; 
			$item->spech = $product->spech; 
			$item->longdesc = $product->longdesc;
			$item->orderno = ''; 
			$item->name3 = $product->name3; 
			$item->name4 = $product->name4; 
			$item->thumb = ''; 
			$item->width = ''; 
			$item->height = ''; 
			$item->productdes = ''; 
			$item->keywords = $product->keywords; 
			$item->vpn = $product->vpn; 
			$item->uomdesc = $product->uomdesc; 
			$item->vidinffg = ''; 
			$item->vidinflk = $product->youtubelink; 
			$item->additemflag = $product->additemflag; 
			$item->schemafam = $product->schemafam; 
			$item->prop65 = $product->prop65; 
			$item->leadfree = $product->leadfree; 
			$item->dummy = '';
			
			$productarray = (array)($item);
			$productarray = fillwithvalues($productarray);
			
			
			if (!item_exists($product->itemid, false)) {
				return insert_product($productarray, $debug);
			}
		}
	}
