<?php
  class Pages extends Controller {
    public function __construct(){
  
    }
    
    public function index(){
      $data = [
        'title' => '首頁',
        'description' => '這裡是首頁'
      ];
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => '關於我們',
        'description' => '關於我們'
      ];

      $this->view('pages/about', $data);
    }
  }