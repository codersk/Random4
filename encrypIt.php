<?php
  error_reporting(0);
    //------------------Shuffle Start------------------//
    //Suffeld arrays withs constant result;
    function r4_Shuffle(&$items,$string) {
      mt_srand($string);

      for ($i = count($items) - 1; $i > 0; $i--){
        $j = @mt_rand(0, $i);
        $tmp = $items[$i];
        $items[$i] = $items[$j];
        $items[$j] = $tmp;
      }
    }
    //----------- Posible Inputs ---------------//
    $items1 = range(' ', '~');
    $items = $items1;
    //------------ Crypto Key -----------------//
    function Split_String($String)
    {
      $STR_LEN = strlen($String);
      $New_String = "";
      for ($i = 0; $i < $STR_LEN; $i++)
      {
        $New_String .= ord($String{$i});
      }
      return $New_String;
    }
    $ukey = $_POST['ukey'];
    // $ukey = 'kumbhar';
    $crypto_key = Split_String($ukey);  // crypto_key
    // echo "string : ", $crypto_key, "<br>";
    $New_String = "";

    $R1 = array();
    r4_Shuffle($items,$crypto_key);
    $R1 = $items;

    $R2 = array();
    r4_Shuffle($items, $crypto_key);
    $R2 = $items;

    $R3 = array();
    r4_Shuffle($items,$crypto_key);
    $R3 = $items;

    $R4 = array();
    r4_Shuffle($items,$crypto_key);
    $R4 = $items;
    //------------------Shuffle End------------------//

    //------------------Get Index Start------------------//
    $String = $_POST["usertext"];
    $STR_LEN = strlen($String);
    for ($i = 0; $i < $STR_LEN; $i++){
        $get_index = array_search($String{$i}, $items1);
        // echo "Index : ".$String{$i}. "=" . $get_index ."<br>";
        if(ord($items1{$get_index}) == ord($String{$i})){
          //------------------Start Encry------------------//
          $oKey = $get_index;
          if($oKey >=97 && $oKey < 123){ //lowercase
            $New_String .= generateString($oKey, $R1);
          }
          else if($oKey >= 65 && $oKey < 91 ){ //uppercase
            $New_String .= generateString($oKey, $R2);
          }
          else if($oKey >= 48 && $oKey < 58 ){ // numbers
            $New_String .= generateString($oKey, $R3);
          }
          else{ // symbols
            $New_String .= generateString($oKey, $R4);
          } //------------------Encry End------------------//
        // }
      }
    } //------------------Get Index End------------------//

    function generateString($key, $getArray){
      return $getArray[$key + 1];
    }
?>