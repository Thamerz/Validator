<?php
/*
Author : Thamer Almohammadi
Date : 2023/01/02
if you want contact with me : 0565611038
*/
class Validator{
    private $errormessage;

    public function Validate_Name($name,$is_space=true,$message,$lang='ar'){
        if($lang == "en"){
        if($is_space){
         if (!preg_match("/^[a-zA-Z-'\s]*$/",$name)) {
             $this->errormessage = $message;
             return $this->errormessage;
            }
    }
    else{
        if (!preg_match("/^[a-zA-Z]*$/", $name)){
            $this->errormessage = $message;
            return $this->errormessage;
        }
    }
}
    else if($lang == "ar"){
        if($is_space){
            if (!preg_match("/^[\p{Arabic}\s]+$/u",$name)) {
            $this->errormessage = $message;
            return $this->errormessage;
               }
       }
       else{
           if (!preg_match("/^[\p{Arabic}]+$/u", $name)){
               $this->errormessage = $message;
               return $this->errormessage;
           }
       }
    }
}

public function Validate_Email($email,$message){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->errormessage = $message;
        return $this->errormessage;
      }
}

public function Validate_Email_sp($email,$message, Array $domains){
                    $email_parts = explode("@",$email);
                    if (!in_array($email_parts[1],$domains)){
                            $this->errormessage = $message;
                            return $this->errormessage;
                    }
}

public function Validate_Url($url,$message){
    var_dump(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url));
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
        $this->errormessage = $message;
        return $this->errormessage;
      }
}

public function CheckEmpty($field,$message){
    if (empty($field)) {
        $this->errormessage = $message;
        return $this->errormessage;
      }
}

public function getDate($format=''){
        if(empty($format)){
            echo "ﻻ يجب ان يكون التاريخ فارغ";
        }
        else {
            return date($format);
        }
}


public function length($string){
    return strlen($string);
}

public function CheckNumber($number,$message){
    if (!preg_match("/^\s*-?[0-9]{1,10}\s*$/",$number)) {
        $this->errormessage = $message;
        return $this->errormessage;
      }
}

public function CheckNumberSaudi($number,$message){
    if (!preg_match("/^(009665|9665|\+9665|05|5)(5|0|3|6|4|9|1|8|7)([0-9]{7})$/",$number)) {
        $this->errormessage = $message;
        return $this->errormessage;
      }
}

public function CreatePhoneInput($fieldname,$placeholder,$isclass=false,$max,$min,$nameClass=''){
        if($isclass){
            return '<input name="'.$fieldname.'" type="tel" class="'.$nameClass.'" placeholder="'.$placeholder.'" min="'.$min.'" max="'.$max.'" required>';
        }
        else{
                return '<input name="'.$fieldname.'" type="tel" placeholder="'.$placeholder.'" min="'.$min.'" max="'.$max.'" required>';
        }
}

public function CheckExitsEmail($connection,$database,$table,$column,$email){
            $select = "SELECT ".$column." FROM ".$database.".".$table." WHERE ".$column."='".$email."'";
            $query = mysqli_query($connection,$select);
            $row = mysqli_num_rows($query);
            if($row == 1){
                return true;
            }
            else {
                return false;
            }
}


}
?>
