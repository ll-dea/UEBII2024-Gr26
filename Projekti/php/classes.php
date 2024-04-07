<?php

class Product {
    public $name;
    public $price;
    public $stock;
    public $description;

    public function __construct($name, $price, $stock, $description) {
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->description = $description;
    }

    public function displayInfo() {
        echo "Product: " . $this->name . "<br>";
        echo "Price: $" . $this->price . "<br>";
        echo "Description: " . $this->description . "<br>";
        if ($this->isAvailable()) {
            echo "In stock<br>"; 
         
        } else {
            "Out of stock. It will be back soon<br>";
        }
    }

    public function isAvailable() {
        return $this->stock > 0;
    }
}



$gloves = new Product("Gloves", 10, 50, "A pair of gardening gloves for protection.");
$pruningShears = new Product("Pruning Shears", 15, 30, "Pruning shears for cutting stems and small branches.");
$loppers = new Product("Loppers", 20, 25, "Loppers for cutting thick branches.");
$gardenFork = new Product("Garden Fork", 18, 35, "A garden fork for loosening soil.");

$snakePlant = new Product("Snake Plant", 25, 20, "The snake plant is a popular indoor plant known for its ability to thrive with little maintenance.");
$pothos = new Product("Pothos", 12, 40, "Pothos is a popular houseplant and known for its easy care and variegated foliage.");
$zzPlant = new Product("ZZ Plant", 30, 0, "The ZZ plant is a low-maintenance houseplant that can survive in low light conditions.");
$peaceLily = new Product("Peace Lily", 22, 10, "The peace lily is an easy-to-care-for indoor plant that produces striking white flowers.");

$lighting = new Product("Lighting", 50, 8, "Various lighting options for your garden or indoor space.");
$garments = new Product("Garments", 8, 60, "Garden garments for protection and comfort.");
$shelf = new Product("Shelf", 40, 0, "Decorative shelves for displaying plants and decorations.");
$verticalGardening = new Product("Vertical Gardening", 50, 8, "Vertical gardening solutions for maximizing space.");


$products = array($gloves, $pruningShears, $loppers, $gardenFork, $snakePlant, $pothos, $zzPlant, $peaceLily, $lighting, $garments, $shelf, $verticalGardening);

?>