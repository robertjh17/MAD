<?php
class MyRaket
{
    protected $name;
    protected $position;

    public function setName($newname)
    {
        $this->name = $newname;
    }

    public function flyTo($landing)
    {
        while ($this->position < $landing) {
            $this->position++;
            echo $this->name . ' is at position ' . $this->position . "\n";
        }
    }
}

$falconHeavy = new MyRaket();
$falconHeavy->setName('Falcon Heavy');
$falconHeavy->flyTo(405500);

$APP17A2Raket = new MyRaket();
$APP17A2Raket->setName('SpaceCake');
$APP17A2Raket->flyTo(14294325485746378475674385432);



















