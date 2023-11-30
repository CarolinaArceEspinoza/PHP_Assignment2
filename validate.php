<?php

class validate {
    // Check for empty fields
    public function checkEmpty($data, $fields) {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "<p>$value field empty</p>";
            }
        }
        return $msg;
    }

    public function checkEmptyImg($imagefields) {
        $msg = null;
        if (empty($imagefields)) {
            $msg .= "<p>Image field empty</p>";
        }
        return $msg;
    }

    // Check if the contact number is numeric
    public function validContact($CONTACT) {
        return preg_match("/^[0-9]+$/", $CONTACT);
    }

    // Check if the email follows the email format
    public function validEmail($EMAIL) {
        return filter_var($EMAIL, FILTER_VALIDATE_EMAIL);
    }

    // Check if the name is not empty
    public function validName($NAME) {
        return !empty($NAME);
    }

    // Check if a position was selected
    public function validPosition($POSITION) {
        return $POSITION != '0';
    }

    // Check if a timeslot was selected
    public function validTimeSlot($TIME_SLOT) {
        return $TIME_SLOT != '0';
    }

    // Check Date of Birth field
    public function validBirth($BIRTH_YEAR) {
        $date = explode("-", $BIRTH_YEAR);
        return checkdate($date[1], $date[2], $date[0]);
    }

 // Check if the username is not empty
    public function validImage($target_file) {
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        
      // Valid image extension
        $valid_extension = array("png","jpeg","jpg");

        if(in_array($file_extension, $valid_extension)) {
            return true;    
          }else{
            return false;
          }
    }

    // Check if the username is not empty
    public function validUserName($USERNAME) {
        return !empty($USERNAME);
    }

    // Check if the password is not empty
    public function validPassword($password) {
        return !empty($password);
    }

    // Check if the confirmed password is not empty and matches the original password
    public function validConfirmPassword($confirm, $password) {
        return !empty($confirm) && $password === $confirm;
    }
}

?>