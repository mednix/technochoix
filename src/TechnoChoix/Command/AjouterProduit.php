<?php namespace TechnoChoix\Command;
use Symfony\Component\Validator\Constraints as Assert;

class AjouterProduit
{
    /**
     * @Assert\NotBlank()
     */
    public $nom;
    /**
     * @Assert\NotBlank()
     */
    public $prix;
    /**
     * @Assert\NotBlank()
     */
    public $detailsTechniques;
     /**
     * @Assert\NotBlank()
     */
    public $image;
}