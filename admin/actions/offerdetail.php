<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'offer_name' => array(
				'required' => true,
				'max' => 50
			),
            'rate' => array(
				'required' => true
            ),
            'caption' => array(
				'required' => true,
				'max' => '100'
            ),
            'description' => array(
				'max' => '1000'
			),
		)); 
		
			if($validation->passed()){

				$offer = new Offer();

				$image = $_FILES['thumbnail']['tmp_name'];
				$imgContent = base64_encode(file_get_contents($image));
				
				try{

					if(Input::get('type') == "add")
					{

						$offer->create(array(
							'offer_name' => Input::get('offer_name'),
							'thumbnail' => $imgContent, 
                            'rate' => Input::get('rate'),
                            'caption' => Input::get('caption'),
                            'description' => Input::get('description')
						));
					}
					else if(Input::get('type') == "edit")
					{

						$updateArray = '';
						if(empty($imgContent)){
							
							$updateArray = array(
								'offer_name' => Input::get('offer_name'),
								'rate' => Input::get('rate'),
								'caption' => Input::get('caption'),
								'description' => Input::get('description'));
						}
						else{

							$updateArray = array(
								'offer_name' => Input::get('offer_name'),
								'thumbnail' => $imgContent, 
								'rate' => Input::get('rate'),
								'caption' => Input::get('caption'),
								'description' => Input::get('description'));

						}

						$offer->update($updateArray, array('offer_id' => Input::get('id')));
						
					}
					else if(Input::get('type') == "delete")
					{
						$offer->delete(Input::get('id'));
					}

				} catch(Exception $e){
					die($e->getMessage());
				}

				Redirect::to(Config::get('application_path') . 'admin/offers.php');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>