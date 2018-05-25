<?php

// Include the main class, the rest will be automatically loaded
require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';

//Application Logic in Page
if($userType != 1 || empty($_GET)){

    clearMessage();
    
    Redirect::to('../message.php');

}

$formHeader = '';
$inputBlockStyle = '';
$inputHeaderStyle = '';
$check_in = "";
$check_out = "";
$nightStay = 0;
$adults = "";
$children = "";
$guests = "";
$type = 0;
$rows;
$visibleOnCheckIn = false;

$reservation = new Reservation();

if($reservation->find(Input::get('requestId'))){

    $reservationId = $reservation->data()->reservation_id;
    $userId = $reservation->data()->user_id;
    $firstname = $reservation->data()->firstname;
    $lastname = $reservation->data()->lastname;

    $requestTimestamp = new DateTime($reservation->data()->requestTimestamp);
    $adults = $reservation->data()->adults;
    $children = $reservation->data()->children;
    $checkIn = new DateTime($reservation->data()->check_in);
    $checkOut = new DateTime($reservation->data()->check_out);
    $reservedNightStays = $checkOut->diff($checkIn)->format('%a')+1;
    $totalAmount = $reservation->data()->total_amount;
    $amountReceived = $reservation->data()->deposit_amount;
    $balance = $reservation->data()->balance_amount;
    
    $nightStay = $checkOut->diff($checkIn)->format('%a')+1;
    $roomId = $reservation->data()->room_id;
    $doorNo = $reservation->data()->door_no;
    $roomSelected = $reservation->data()->room_name;
    $roomRate = $reservation->data()->rate;

    $actualAdults = $reservation->data()->adults_actual;
    $actualChildren = $reservation->data()->children_actual;

    $actualCheckIn = '';
    $actualCheckOut = '';
    $disabledCheckIn = '';
    $disabledCheckOut = '';
    $disabledAdults = '';
    $disabledChildren = '';
    $disabledAdditionalCharges = '';
    $requiredCheckIn = '';
    $requiredCheckOut = '';
    $actualNightStays = 0;
    $balanceAmountLabel = 'Balance To Be Paid';
    $totalPayable = 0.00;
    $additionalAmount = 0.00;
    $balanceAmount = 0.00;
    $cancelled = true;

    $additionalAmount = $reservation->data()->additional_amount;

    //$totalAmount = $nightStay * $roomRate;
    $minPayable = $totalAmount * (60/100);
    $balancePayable = ($totalAmount - $minPayable);

    if($reservation->data()->cancelled){


        $formHeader = 'Reservation  - Cancelled';
        $inputBlockStyle = 'block-cancelled';
        $inputHeaderStyle = 'header-cancelled';

        $disabledCheckIn = 'disabled=disabled';
        $disabledAdults = 'disabled=disabled';
        $disabledChildren = 'disabled=disabled';
        $disabledCheckOut = 'disabled=disabled';
        $disabledAdditionalCharges = 'disabled=disabled';
        $cancelled = false;
     
        $checkActionButton = "Ok";
        $type = 3;


    }else{

        $inputBlockStyle = 'block-active';
        $inputHeaderStyle = 'header-active';

        //Room Check-In Function
        if(empty($reservation->data()->check_in_actual)){

            $visibleOnCheckIn = true;
            $formHeader = 'Reservation - Check-In';

            $disabledCheckOut = 'disabled=disabled';
            $disabledAdditionalCharges = 'disabled=disabled';
            $checkActionButton = 'Check In';

            $roomAllocation = new RoomAllocation();
            $rows = $roomAllocation->availableRooms($roomId);

        }

        //Room Check-Out Function
        if(!empty($reservation->data()->check_in_actual)){

            $formHeader = 'Reservation - Check-Out';

            $actualCheckIn = (new DateTime($reservation->data()->check_in_actual))->format('Y-m-d');

            $disabledCheckIn = 'disabled=disabled';
            $disabledAdults = 'disabled=disabled';
            $disabledChildren = 'disabled=disabled';
            $requiredCheckIn = 'required';
            $checkActionButton = "Check Out";
            $type = 1;

        }

        if(!empty($reservation->data()->check_out_actual)){

            $formHeader = 'Reservation - Left';

            $CheckInDate = new DateTime($reservation->data()->check_in_actual);
            $CheckOutDate = new DateTime($reservation->data()->check_out_actual);
            $actualNightStays = $CheckOutDate->diff($CheckInDate)->format('%a')+1;
            $actualCheckOut = $CheckOutDate->format('Y-m-d');
            $balanceAmount = $reservation->data()->balance_amount;

            $disabledCheckOut = 'disabled=disabled';
            $disabledAdditionalCharges = 'disabled=disabled';
            $requiredCheckOut = 'required';
            $type = 2;
            $checkActionButton = "Ok";
            $totalPayable =  $balanceAmount - $additionalAmount;
            $cancelled = false;

            //If guests stay more than pre-booked days, they have to pay additional amount for the days they stayed extra.
            //Or if the guests leave before the checkout day Hotel has to give the balance to guest
            // Following is where that happens.

            if (($actualNightStays * $roomRate) >= $totalAmount){

                $balanceAmountLabel = 'Balance To Be Paid';
                
                //$balanceAmount = abs(($balancePayable + (($actualNightStays - $reservedNightStays) *  $roomRate)) +  $additionalAmount);

            }else{

                $balanceAmountLabel = 'Balance To Be Given Back';
                //$balanceAmount = abs(($balancePayable - (($reservedNightStays - $actualNightStays) *  $roomRate))  +  $additionalAmount);

            }

        }
}

    // Create the controller, it is reusable and can render multiple templates
    $core = new Dwoo\Core();

    // Load a template file, this is reusable if you want to render multiple times the same template with different data
    $confirmation = new Dwoo\Template\File('../layouts/checkInOut.tpl');
    $footerTemplate = new Dwoo\Template\File('../layouts/template/_footer.tpl');
    $scriptTemplate = new Dwoo\Template\File('../layouts/template/_scripts.tpl');
    $validationScriptTemplate = new Dwoo\Template\File('../layouts/template/_validationScripts.tpl');
    $layoutTemplate = new Dwoo\Template\File('../layouts/template/_layout.tpl');

    // Create a data set, this data set can be reused to render multiple templates if it contains enough data to fill them all
    $confirmationData = new Dwoo\Data();

    $confirmationData->assign('type', $type);
    $confirmationData->assign('reservationId', $reservationId);
    $confirmationData->assign('userId', $userId);
    $confirmationData->assign('firstname', $firstname);
    $confirmationData->assign('lastname', $lastname);

    $confirmationData->assign('requestedDate', $requestTimestamp->format('d-m-Y'));
    $confirmationData->assign('checkIn', $checkIn->format('d-m-Y'));
    $confirmationData->assign('checkOut', $checkOut->format('d-m-Y'));
    $confirmationData->assign('nightStay', $reservedNightStays);
    $confirmationData->assign('adults', $adults);
    $confirmationData->assign('children', $children);
    $confirmationData->assign('roomSelected', $roomSelected);
    $confirmationData->assign('roomRate', number_format($roomRate, 2));
    $confirmationData->assign('roomId', $roomId);
    $confirmationData->assign('doorNo', $doorNo);

    $confirmationData->assign('totalAmount', number_format($totalAmount, 2));
    $confirmationData->assign('minPayable', number_format($minPayable, 2));
    $confirmationData->assign('additionalCharges', number_format($additionalAmount, 2));
    $confirmationData->assign('balanceToBePaid', number_format($balancePayable, 2));

    $confirmationData->assign('actualAdults', $actualAdults);
    $confirmationData->assign('actualChildren', $actualChildren);
    $confirmationData->assign('actualCheckIn', $actualCheckIn);
    $confirmationData->assign('actualCheckOut', $actualCheckOut);
    $confirmationData->assign('actualNightStays', $actualNightStays);
    $confirmationData->assign('totalPayable', number_format($totalPayable, 2));
    $confirmationData->assign('balanceAmount', number_format($balanceAmount, 2));

    $confirmationData->assign('balanceAmountLabel', $balanceAmountLabel);
    $confirmationData->assign('requiredCheckIn', $requiredCheckIn);
    $confirmationData->assign('requiredCheckOut', $requiredCheckOut);

    $confirmationData->assign('formHeader', $formHeader);
    $confirmationData->assign('inputBlockStyle', $inputBlockStyle);
    $confirmationData->assign('inputHeaderStyle', $inputHeaderStyle);
    $confirmationData->assign('disabled', 'disabled=disabled');
    $confirmationData->assign('disabledCheckIn', $disabledCheckIn);
    $confirmationData->assign('disabledCheckOut', $disabledCheckOut);
    $confirmationData->assign('disabledAdults', $disabledAdults);
    $confirmationData->assign('disabledChildren', $disabledChildren);
    $confirmationData->assign('disabledAdditionalCharges', $disabledAdditionalCharges);
    $confirmationData->assign('checkActionButton', $checkActionButton);
    $confirmationData->assign('cancelled', $cancelled);

    $confirmationData->assign('visibleOnCheckIn', $visibleOnCheckIn);
    if($visibleOnCheckIn){
        $confirmationData->assign('roomList', objectToArray($rows));
    }else{
        $confirmationData->assign('doorNo', $reservation->data()->door_no);
    }
    

    $validationScriptPage = new Dwoo\Data();
    $validationScriptPage->assign('validationScripts', $core->get($validationScriptTemplate));

    $mainPage = new Dwoo\Data();
    $mainPage->assign('pageTitle', 'Availability');
    $mainPage->assign('userType', $userType);
    $mainPage->assign('username', strtoupper($username));
    $mainPage->assign('avatar', $avatar);
    $mainPage->assign('content', $core->get($confirmation, $confirmationData));
    $mainPage->assign('footer', $core->get($footerTemplate));
    $mainPage->assign('scripts', $core->get($scriptTemplate, $validationScriptPage));

    echo $core->get($layoutTemplate, $mainPage);

}else{

    Session::put('message_title', 'Ooops!');
    Session::put('message', 'Oops!');
    Session::put('sub_message', '404 or whatever, Page not available.');

    Redirect::to('../message.php');

}

?>