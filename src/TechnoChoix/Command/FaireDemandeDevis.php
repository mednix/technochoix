<?php namespace TechnoChoix\Command;
use Symfony\Component\Validator\Constraints as Assert;

class FaireDemandeDevis
{
    /**
     * @Assert\NotBlank()
     */
    public $nom;
    /**
     * @Assert\NotBlank()
     */
    public $telephone;
    /**
     * @Assert\NotBlank()
     */
    public $demande;
}