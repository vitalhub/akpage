<?php	

	if(isset($cities)) {
	
		if( $cities ){

			echo "<option value=''>Select City</option>\n";
			foreach($cities as $city) {
				echo "<option value=".$city['City']['id'].">".$city['City']['city']."</option>\n";
			}
			
		}else{
		
			echo "<option value=''>Select City</option>\n";
		}
	}
	
	
	if(isset($partnerCities)) {
	
		if( $partnerCities ){
	
			echo "<option value=''>Select City</option>\n";
			foreach($partnerCities as $partnerCity) {
				echo "<option value=".$partnerCity['City']['id'].">".$partnerCity['City']['city']."</option>\n";
			}
				
		}else{
	
			echo "<option value=''>Select City</option>\n";
		}
	}
	
	

?>