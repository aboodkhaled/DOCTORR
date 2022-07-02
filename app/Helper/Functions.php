<?php

  function sessionFlush(){
    Session::forget('source');
    Session::forget('target');
  }

  function setTarget($target){
    Session::put('target',$target);
  }

  function setSource($source){
    Session::put('source',$source);
  }

  function translateText($text){
    $src = Session::get('source');
    $target = Session::get('target');
    if($target == '' || $target == null) return $text;
    if($src == '' || $src == null) 
    {
      $src= env('BaseLanguage');
      Session::put('source',env('BaseLanguage'));
    }
    if($src == $target) return $text;
    else{
      $translation=TranslateText::translate($src,$target,$text);
      return $translation;
    }
  }
?>
