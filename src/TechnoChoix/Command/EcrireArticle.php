<?php namespace TechnoChoix\Command;
use Symfony\Component\Validator\Constraints as Assert;

class EcrireArticle
{
    /**
     * @Assert\NotBlank()
     */
    public $titre;
    /**
     * @Assert\NotBlank()
     */
    public $sousTitre;
    /**
     * @Assert\NotBlank()
     */
    public $image;
     /**
     * @Assert\NotBlank()
     */
    public $body;
}