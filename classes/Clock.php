<?php


class Clock 
{
  public function countBells($start, $end)
  {    
    $firstRingTime = (int)ceil($this->convertTimeToNumber($start));
    $lastRingTime = (int)floor($this->convertTimeToNumber($end));
    
    if($firstRingTime > 12){
      $firstRingTime = $this->convertTimeToTwelveHour($firstRingTime);
    }

    if($lastRingTime > 12){
      $lastRingTime = $this->convertTimeToTwelveHour($lastRingTime);
    }
    
    $totalRings = $this->getFirstRings($firstRingTime);
    $totalRings += $this->getSecondRings($lastRingTime);
    
    return $totalRings;
  }
  
  private function convertTimeToNumber($time)
  {
    $timeParts = explode(':', $time);
    return (floatval($timeParts[0]) + floatval(($timeParts[1]/60) * 100));
  }
  
  private function convertTimeToTwelveHour($ringTime)
  {
    return $ringTime-12;
  }
  
  private function getFirstRings($firstRing)
  {
    $total = 0;
    while($firstRing <= 12){
      $total += $firstRing;
      $firstRing++;
    }
    return $total;
  }
  
  private function getSecondRings($lastRing)
  {
    $total = 0;
    while($lastRing > 0){
      $total += $lastRing;
      $lastRing--;
    }
    return $total;
  }
}
?>