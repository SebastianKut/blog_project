<?php 

class Helper{
    
    public function passwordsMatch ($pw1, $pw2) {
        if ($pw1 == $pw2)
            return true;
          else 
            return false;
    };

    public function isValidLength ($str, $min = 8, $max = 20) {
        if ( strlen($str) >= $min && strlen($str) <= $max ) 
            return true;
          else 
            return false;
    };
    
    public function isEmpty ($postValues) {
        foreach($postValues as $value) {
            if ($value == '') 
                return true;
            } 
            return false;
    };

}