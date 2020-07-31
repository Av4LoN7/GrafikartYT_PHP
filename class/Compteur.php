<?php

class Compteur
{
    private $counterLocation;
    private $counterValue = 1;

    public function __construct(string $counterPath = "compteur.txt")
    {
        $this->counterLocation = $counterPath;
        $this->createCounterTxtIfNotExist($this->counterLocation);
        $this->setCounterValue();
    }

    private function createCounterTxtIfNotExist(string $path) {
        if(!file_exists($path)) {
            file_put_contents($path, $this->counterValue);
        }
    }

    private function setCounterValue() {
        $this->counterValue = file_get_contents($this->counterLocation);
    }

    public function getCounterValue() : int {
        return $this->counterValue;
    }

    public function incrementAndSaveCounter() {
       $this->counterValue++;
       file_put_contents($this->counterLocation, $this->counterValue);
    }
}
