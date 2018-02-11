<?php
class Car
{
    protected $name;
    protected $position;

    public function setName($new_name)
    {
        $this->name = $new_name;
    }

    public function driveTo($finish)
    {
        while ($this->position < $finish) {
            $this->position++;
            echo $this->name . ' is at position ' . $this->position . "\n";
        }
    }
}
