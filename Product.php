<?php

class Product{
    private $id;
    private $author;
    private $title;
    private $price;
    private $availableQuantity;

    public function __construct($id,$author,$title,$price,$availableQuantity){
        $this->id = $id;
        $this->author = $author;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    public function getId(){
        return $this->id;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getAvailableQuantity(){
        return $this->availableQuantity;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setAvailableQuantity($availableQuantity){
        $this->availableQuantity = $availableQuantity;
    }

    public function addToCard($cart,$product,$count){
        if(checkQuantity($product->getId(),$count)){
           $cart->addProduct($product->getId(),$count);
           $cart->setSum($cart->getSum()+$count*$product->getPrice())
           return true;
        }
        else return false;
    }

    public function checkQuantity($id,$count){
        return ($id->getAvailableQuantity()<$count) ? false:true; 
    }
}

?>