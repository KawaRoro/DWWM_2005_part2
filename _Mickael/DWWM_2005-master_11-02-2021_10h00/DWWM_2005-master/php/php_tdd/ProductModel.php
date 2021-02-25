<?php 


class ProductModel
{
    private int $id;

    private string $name;

    private float $price;


    public function __construct(int $_id, string $_name, float $_price)
    {
        $this->id = $_id;
        $this->name = $_name;
        $this->price = $_price;
    }
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }


    public function getFinalPrice(int $_tva)
    {
        return ($this->price + ($this->price * $_tva / 100));
    }
}