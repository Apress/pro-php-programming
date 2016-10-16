#!/usr/bin/env php
<?php
class animal {
    public $species;
    public $name;
    function __construct($kind,$name) {
        $this->species=$kind;
        $this->name=$name;
    }
    function __toString() {
        return($this->species.'.'.$this->name);
    }
}
$pet = new animal("dog","Fido");
$text = <<<'EOT'
    My favorite animal in the whole world is my {$pet->species}. 
    His name is {$pet->name}.\n 
    This is the short name: $pet\n
EOT;
print "NEWDOC:\n$text\n";
$text = <<<EOT
    My favorite animal in the whole world is my {$pet->species}. 
    His name is {$pet->name}.\n 
    This is the short name: $pet\n
EOT;
print "HEREDOC:\n$text";
