<?php
/**
 * Author: Kierra White
 * Date: 11/15/24
 * File: pastry.class.php
 * Description: This class represents a Pastry
 */
class Pastry{
  private int $pastryId, $categoryId, $stockQuantity;
  private string $name;
  private ?string $description, $imagePath;
  private float $price;
  private bool $availability;

//Constructor
  public function __construct ($pastryId, $categoryId, $stockQuantity. $name, $description, $imagePath,
                             $price, $avaibility){
    $this->pastryId = $pastryId;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->categoryId = $categoryId;
    $this->availability = $availability;
    $this->imagePath = $imagePath;
    $this->stockQuantity = $stockQuantity;
    }

//Get pastry ID
  public function getPastryId(): int {
     return $this->pastryId;
    }
  //Get name
  public function getName(): string {
        return $this->name;
    }
  //Get description
  public function getDescription(): ?string {
        return $this->description;
    }
  //Get price
  public function getPrice(): float {
        return $this->price;
    }
  //Get Category ID
  public function getCategoryId(): int {
        return $this->categoryId;
    }
  //Get Availbility
  public function isAvailable(): bool {
        return $this->availability;
    }
  //Get image Path
  public function getImagePath(): ?string {
        return $this->imagePath;
    }
  //Get Stock Quantity
  public function getStockQuantity(): int {
        return $this->stockQuantity;
    }
  //Set name
  public function setName(string $name): void {
        $this->name = $name;
    }
  //Set Description
  public function setDescription(?string $description): void {
        $this->description = $description;
    }
  //Set Price
  public function setPrice(float $price): void {
        $this->price = $price;
    }
  //Set Category ID
  public function setCategoryId(int $categoryId): void {
        $this->categoryId = $categoryId;
    }
  //Set Availability 
  public function setAvailability(bool $availability): void {
        $this->availability = $availability;
    }
  //Set Image Path
  public function setImagePath(?string $imagePath): void {
        $this->imagePath = $imagePath;
    }
  //Set Stock Quantity
  public function setStockQuantity(int $stockQuantity): void {
        $this->stockQuantity = $stockQuantity;
    }
}
?>
  
  
  
  
  
  
  
  
  
