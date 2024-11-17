<?php
/**
 * Author: Kierra White
 * Date: 11/15/24
 * File: inventory.class.php
 * Description: This class represents the Inventory
 */
class Inventory {
  private int $logId, $pastryId, $changeQuantity;
  private string $reason, $timeUpdated;

  //Constructor
  public function __construct ($logId, $pastryId, $changeQuantity, $reason, $timeUpdated){
    $this->logId = $logId;
    $this->pastryId = $pastryId;
    $this->changeQuantity = $changeQuantity;
    $this->reason = $reason;
    $this->timeUpdated = $timeUpdated;
    }

//Get Log ID
  public function getLogId(): int {
        return $this->logId;
    }

  //Get Pasry ID
  public function getPastryId(): int {
        return $this->pastryId;
    }

  //Get Change Quantity
  public function getChangeQuantity(): int {
        return $this->changeQuantity;
    }

  //Get Reason
  public function getReason(): string {
        return $this->reason;
    }

  //Get updated time
  public function getTimeUpdated(): string {
        return $this->timeUpdated;
    }

  //Set Quantity
  public function setChangeQuantity(int $changeQuantity): void {
        $this->changeQuantity = $changeQuantity;
    }

  //Set Reason
  public function setReason(string $reason): void {
        $this->reason = $reason;
    }

  //Set time
  public function setTimeUpdated(string $timeUpdated): void {
        $this->timeUpdated = $timeUpdated;
    }
}
?>
  
  
  
  
  
  
