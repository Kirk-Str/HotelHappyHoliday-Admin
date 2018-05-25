<?php 

        
        require 'core/init.php';

        
       echo Email::UserAccountRegistrationConfirmation(62);
       echo Email::OfferRequestConfirmation(10);
        
       echo Email::RoomReservationConfirmed(31);
        echo Email::RoomCheckoutAndBilling(31);
       
       
       
   ?>

