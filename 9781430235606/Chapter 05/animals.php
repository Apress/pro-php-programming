<?php
namespace animal\wild {
  class animal {
      static function whereami() { print __NAMESPACE__."\n"; }
      function __construct() {
        $this->type='tiger';
      }
      function get_type() {
          return($this->type);
      }
  }
}

namespace animal\domestic {
  class animal {
      function __construct() {
          $this->type='dog';
      }
      function get_type() {
          return($this->type);
      }
  }
}
?>
