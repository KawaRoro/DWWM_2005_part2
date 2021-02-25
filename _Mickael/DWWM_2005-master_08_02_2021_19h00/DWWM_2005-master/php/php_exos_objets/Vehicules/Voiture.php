<?php 


class Voiture 
{
    private Moteur $_moteur;

    public function __construct(Moteur $newMoteur)
    {
        $this->_moteur = $newMoteur;
    }
}
