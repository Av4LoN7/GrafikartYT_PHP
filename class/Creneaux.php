<?php

class Creneaux {
    public $start;
    public $finish;

    public function __construct(int $debut, int $fin)
    {
        $this->start = $debut;
        $this->finish = $fin;
    }

    public function includedHour(int $hour) : bool
    {
        return $this->start <= $hour && $this->finish >= $hour;
    }

    public function intersect(Creneaux $creneaux)
    {
        return $this->includedHour($creneaux->start) ||
            $this->includedHour($creneaux->finish) ||
            ( $this->start < $creneaux->start && $this->finish > $creneaux->finish );
    }

    public function returnString() : string
    {
        return <<<HTML
Le magasin est ouvert de <strong>{$this->start}h</strong> à <strong>{$this->finish}h</strong>.
HTML;
    }
}

?>
