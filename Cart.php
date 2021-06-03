<?php

class Cart{
    private $productList;
    private $sum;

    public function getProductList(){
        return $this->productList;
    }
    public function getSum(){
        return $this->sum;
    }

    public function setProductList($productList){
        $this->productList = $productList;
    }
    public function setSum($sum){
        $this->sum = $sum;
    }

    public function addProduct($id,$count){
        $arr = array($id,$count);
        setProductList(array_merge(getProductList,$arr));
    }

}

?>