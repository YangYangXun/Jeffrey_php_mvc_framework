<?php

 /*
  * App Core Class
  * Creates URL & loads core controller
  * URL Format - /controller/mehtod/params
  * 
  */

  class Core{
      protected $currentController = 'Pages';
      protected $currentMethod = 'index';
      // 摸post/add urlarray
      protected $params = []; // http: //localhost/Jeffrey/post/add


      public function __construct(){

          $url = $this->getUrl();

          //check the first part of url
          //Look in controllers foder for first value
          if(file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
              // if exists, set as controller
              $this->currentController = ucwords($url[0]);
              // Unset 0 Index
              unset($url[0]);
          }

         //Require the controller
         require_once '../app/controllers/'. $this->currentController . '.php';

         // Instabtiate controller class
         $this->currentController = new $this->currentController;

         //check the second part of url
         if(isset($url[1])){
             //check to see if method exists in controller
             if(method_exists($this->currentController, $url[1])){
                 $this->currentMethod = $url[1];
                 // Unset 1 Index
                 unset($url[1]);
            }
         }

         //Get params
         $this->params = $url ? array_values($url) : [] ;

         //Call a callback with array of params
         call_user_func_array([$this->currentController,
         $this->currentMethod], $this->params);

      }

      public function getUrl(){
          if(isset($_GET['url'])){

              $url = rtrim($_GET['url'], '/');
              // 筁耾竟埃才﹃い┮Τ獶猭URL才
              $url = filter_var($url, FILTER_SANITIZE_URL);
              // ㄧ计р才﹃ゴ床计舱 (split)
              $url = explode('/',$url);
              return $url;
          }
      }

  }

  
