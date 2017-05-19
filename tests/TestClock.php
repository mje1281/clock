
<?php
require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../classes/Clock.php');

class TestOfClock extends UnitTestCase {
  
  function __construct() {
      parent::__construct('Clock');
  }
  
  function testClockCountBells() {
    $clock = new Clock();
    $this->assertTrue($clock->countBells('2:00', '3:00'), 5);
    $this->assertTrue($clock->countBells('14:00', '15:00'), 5);
    $this->assertTrue($clock->countBells('14:23', '15:42'), 3);
    $this->assertTrue($clock->countBells('23:00', '1:00'), 24);
  }
}
?>
