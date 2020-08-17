<?php namespace App\Controllers;
use CodeIgniter\Controller;
Class Hello extends Controller{
    public function index($name){
        echo "Hello".$name;
    }
    public function hello($name){
        return view('hello',['data'=>$name]);
    }

}

