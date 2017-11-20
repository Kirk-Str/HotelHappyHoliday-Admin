<?php

require '../../vendor/autoload.php';

if (Input::exists()){

	//if(Token::check(Input::get('token'))){

		$validate = new Validate();
		$validation = $validate->check($_POST,array(
			'request-id' => array(
				'required' => true,
				'max' => 50
			),
            'action' => array(
				'required' => true
            ),
		)); 
		
			if($validation->passed()){

				try{

					$requestId = Input::get('request-id');
					$approvalStatus = '';

					if(Input::get('action') == 'Accept'){
						$approvalStatus = 1;
					}elseif(Input::get('action') == 'Decline'){
						$approvalStatus = 0;
					}else{
						$approvalStatus = null;
					}

					if(!is_null($approvalStatus)){
						$request = new Request();
						$request->find($requestId);
						$request->update(array('approval_status' => $approvalStatus, 'approval_timestamp' => date('Y-m-d h:i:s a')), $requestId);
					}

				} catch(Exception $e){
					die($e->getMessage());
				}
				
				Redirect::to(Config::get('application_path') . 'admin/requestList.php?type=opt-filter-all');

			} else {
				foreach($validation->errors() as $error){
					echo $error, '<br>';
				}
			}
	//}

}

?>