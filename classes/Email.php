<?php

require_once  $_SERVER['DOCUMENT_ROOT']  . '/core/init.php';
//require 'core/init.php';

class Email{

    private static $_senderEmail;
    private static $_emailConfirmationMessage;

    public static function initialize(){

        self::$_senderEmail = Config::get('sender_email');
        $_emailConfirmationMessage = 'Email setting failed at server! Please report to administrator';

    }

    //Send email on User Account registration
    public static function UserAccountRegistrationConfirmation($userId){

        self::initialize();

        $subject = 'Welcome to Orca Beach Resort :)';

        $summary = '';
        $mainContent = '';
        $subContent = '';

        $core = new Dwoo\Core();

        // Load a template file, this is reusable if you want to render multiple times the same template with different data
        $mainContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateMainContentUserAccountCreation.tpl');
        $subContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateSubContentReservation.tpl');

        $mainPageData = new Dwoo\Data();
        $mainContentPageData = new Dwoo\Data();
        $SubContentPageData = new Dwoo\Data();

        $user = new User();
        $emailDataBundle = $user->find($userId);

        if(!empty($emailDataBundle)){

            $recipient = $emailDataBundle->email_id;
            $guestName = $emailDataBundle->firstname . ' ' . $emailDataBundle->lastname;

            $mainContentPageData->assign('guest_name', $guestName);

            $summary = '';
            
            $mainContent = $core->get($mainContentEmailTemplate, $mainContentPageData);
            
            $subContent = '';

            $retVal = self::FormatEmail(self::$_senderEmail, $recipient, $subject, $summary, $mainContent, $subContent);

            if($retVal){
                return true;
            }else{
                return self::$_emailConfirmationMessage;
            }
        }

        return self::$_emailConfirmationMessage;

    }

    //Offer Request Confirmation
    public static function OfferRequestConfirmation($requestId){


        self::initialize();

        $subject = 'Offer Request Pending -  Orca Beach Resort, Ltd.';

        $summary = '';
        $mainContent = '';
        $subContent = '';

        $core = new Dwoo\Core();

        // Load a template file, this is reusable if you want to render multiple times the same template with different data
        $mainContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateMainContentOfferRequest.tpl');
        $subContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateSubContentReservation.tpl');

        $mainPageData = new Dwoo\Data();
        $mainContentPageData = new Dwoo\Data();
        $SubContentPageData = new Dwoo\Data();

        $request = new Request();
        $emailDataBundle = $request->find($requestId);

        if(!empty($emailDataBundle)){

            $recipient = $emailDataBundle->email_id;
            $guestName = $emailDataBundle->firstname . ' ' . $emailDataBundle->lastname;
            $offer_name = $emailDataBundle->offer_name;
            $rate = $emailDataBundle->rate;
            $startDate = $emailDataBundle->event_start_date;
            $endDate = $emailDataBundle->event_end_date;
            $guests = $emailDataBundle->guests;
            $additionalRequest = $emailDataBundle->note;

            $mainContentPageData->assign('guest_name', $guestName);
            $mainContentPageData->assign('request_id', $requestId);
            $mainContentPageData->assign('offer_name', $offer_name);
            $mainContentPageData->assign('rate_per_guest', $rate);
            $mainContentPageData->assign('start_date', $startDate);
            $mainContentPageData->assign('end_date', $endDate);
            $mainContentPageData->assign('guests', $guests);
            $mainContentPageData->assign('additional_request', $additionalRequest);

            $summary = '';
            
            $mainContent = $core->get($mainContentEmailTemplate, $mainContentPageData);
            
            $subContent = '<br/><p style="MARGIN-LEFT: 6px; MARGIN-RIGHT: 6px"><font face="Helvetica" color="#001F3E" size="3">The request has been sent for approval. One of our representative will get back to you shortly.</font></p><br/><br/><br/><br/>';
        
            // $mainPageData->assign('summary', $summary);
            // $mainPageData->assign('main_content', $mainContent);
            // $mainPageData->assign('sub_content', $subContent);

            $retVal = self::FormatEmail(self::$_senderEmail, $recipient, $subject, $summary, $mainContent, $subContent);

            if($retVal){
                return true;
            }else{
                return self::$_emailConfirmationMessage;
            }
        }

        return self::$_emailConfirmationMessage;
    }


    //Send email on booking
    public static function RoomReservationConfirmed($reservationId){


        self::initialize();

        $subject = 'Reservation Confirmation - Orca Beach Resort, Ltd.';

        $summary = '';
        $mainContent = '';
        $subContent = '';

        $core = new Dwoo\Core();

        $mainContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateMainContentReservation.tpl');
        $subContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateSubContentReservation.tpl');


        $mainPageData = new Dwoo\Data();
        $mainContentPageData = new Dwoo\Data();
        $SubContentPageData = new Dwoo\Data();


        $reservation = new Reservation();
        $emailDataBundle = $reservation->find($reservationId);

        if(!empty($emailDataBundle)){

            $check_in = new DateTime($emailDataBundle->check_in);
            $check_out = new DateTime($emailDataBundle->check_out);
            $nightStay = $check_in->diff($check_out)->format('%a')+1;

            $recipient =  $emailDataBundle->email_id;

            $mainContentPageData->assign('guest_name', $emailDataBundle->firstname . ' ' . $emailDataBundle->lastname);
            $mainContentPageData->assign('reservation_id', $emailDataBundle->reservation_id);
            $mainContentPageData->assign('check_in_date', $emailDataBundle->check_in);
            $mainContentPageData->assign('check_out_date', $emailDataBundle->check_out);
            $mainContentPageData->assign('no_nights_stay', $nightStay);
            $mainContentPageData->assign('adults', $emailDataBundle->adults);
            $mainContentPageData->assign('children', $emailDataBundle->children);
            $mainContentPageData->assign('room_type', $emailDataBundle->room_name);
            $mainContentPageData->assign('total_amount', number_format($emailDataBundle->total_amount, 2));
            $mainContentPageData->assign('paid_amount', number_format($emailDataBundle->deposit_amount, 2));
            $mainContentPageData->assign('balance_amount', number_format($emailDataBundle->balance_amount, 2));
            $mainContentPageData->assign('room_rate', number_format($emailDataBundle->rate, 2));

            $summary = '<p style="MARGIN-LEFT: 6px; MARGIN-RIGHT: 6px"><font face="Helvetica" color="#001F3E" size="3">Your stay is almost here and we can\'t wait to welcome you in here on your arival</font><p/>
            <p style="MARGIN-LEFT: 6px; MARGIN-RIGHT: 6px"><font face="Helvetica" color="#001F3E" size="3">If you need help with transportation or dinner in your first night please let us know. We\'re here to help and, we can\'t wait to see you.</font></p>';
            
            $mainContent = $core->get($mainContentEmailTemplate, $mainContentPageData);
            
            $subContent = $core->get($subContentEmailTemplate);

            $retVal = self::FormatEmail(self::$_senderEmail, $recipient, $subject, $summary, $mainContent, $subContent);

            if($retVal){
                return true;
            }else{
                return self::$_emailConfirmationMessage;
            }
        }

        return self::$_emailConfirmationMessage;

    }


      //Send email on check out and billing
      public static function RoomCheckoutAndBilling($reservationId){


        self::initialize();

        $subject = 'Check Out and Billing - Orca Beach Resort, Ltd.';

        $summary = '';
        $mainContent = '';
        $subContent = '';

        $core = new Dwoo\Core();

        $mainContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateMainContentCheckoutAndBilling.tpl');
        $subContentEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateSubContentReservation.tpl');


        $mainPageData = new Dwoo\Data();
        $mainContentPageData = new Dwoo\Data();
        $SubContentPageData = new Dwoo\Data();


        $reservation = new Reservation();
        $emailDataBundle = $reservation->find($reservationId);

        if(!empty($emailDataBundle)){

            $check_in = new DateTime($emailDataBundle->check_in);
            $check_out = new DateTime($emailDataBundle->check_out);
            $nightStay = $check_in->diff($check_out)->format('%a')+1;
    
            $recipient =  $emailDataBundle->email_id;
    
            $mainContentPageData->assign('guest_name', $emailDataBundle->firstname . ' ' . $emailDataBundle->lastname);
            $mainContentPageData->assign('reservation_id', $emailDataBundle->reservation_id);
            $mainContentPageData->assign('check_in_date', $emailDataBundle->check_in);
            $mainContentPageData->assign('check_out_date', $emailDataBundle->check_out);
            $mainContentPageData->assign('no_nights_stay', $nightStay);
            $mainContentPageData->assign('adults', $emailDataBundle->adults);
            $mainContentPageData->assign('children', $emailDataBundle->children);
            
            $mainContentPageData->assign('check_in_actual',  $emailDataBundle->check_in_actual);
            $mainContentPageData->assign('check_out_actual',  $emailDataBundle->check_out_actual);
    
            $mainContentPageData->assign('adults_actual',  $emailDataBundle->adults_actual);
            $mainContentPageData->assign('children_actual',  $emailDataBundle->children_actual);
    
            $mainContentPageData->assign('room_type', $emailDataBundle->room_name);
            $mainContentPageData->assign('total_amount', number_format($emailDataBundle->total_amount,2));
            $mainContentPageData->assign('advance_paid_amount', number_format($emailDataBundle->deposit_amount,2));
            $mainContentPageData->assign('additional_amount', number_format($emailDataBundle->additional_amount,2));
            $mainContentPageData->assign('balance_paid_amount', number_format($emailDataBundle->balance_amount,2));
            $mainContentPageData->assign('room_rate', number_format($emailDataBundle->rate,2));

            $summary = '<p style="MARGIN-LEFT: 6px; MARGIN-RIGHT: 6px"><font face="Helvetica" color="#001F3E" size="3">We hope that you had a wonderful stay at Orca Beach Resort. We, on behalf of our staffs, management team thank you wholeheartedly :)';
            
            $mainContent = $core->get($mainContentEmailTemplate, $mainContentPageData);
            
            $subContent = '<br/><br/><p style="MARGIN-LEFT: 6px; MARGIN-RIGHT: 6px"><font face="Helvetica" color="#001F3E" size="3">Once again thank you for choosing us. We will look forward to meet you again.</font></p><br/><br/>';

            $retVal = self::FormatEmail(self::$_senderEmail, $recipient, $subject, $summary, $mainContent, $subContent);

            if($retVal){
                return true;
            }else{
                return self::$_emailConfirmationMessage;
            }
        }

        return self::$_emailConfirmationMessage;

    }


    // Baseline Functions //

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public static function FormatEmail($sender, $recipient , $subject, $summary, $mainContent, $subContent){

        // Create the controller, it is reusable and can render multiple templates
        $core = new Dwoo\Core();

        // Load a template file, this is reusable if you want to render multiple times the same template with different data
        $generalEmailTemplate = new Dwoo\Template\File($_SERVER['DOCUMENT_ROOT'] . '/layouts/template/_emailTemplateGeneral.tpl');

        $mainPage = new Dwoo\Data();
        $mainPage->assign('summary', $summary);
        $mainPage->assign('main_content', $mainContent);
        $mainPage->assign('sub_content', $subContent);

        $message = $core->get($generalEmailTemplate, $mainPage);
        
        $header = "From:$sender \r\n";
        //$header .= "Cc:afgh@somedomain.com \r\n";
        $header .= 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        return self::Send($header, $recipient, $subject, $message);

    }

    private static function Send($header, $recipient, $subject, $message){

        $retVal = mail($recipient, $subject, $message, $header);

        if($retVal){
            return true;
        }else{
            return false;
        }

    }
}

?>