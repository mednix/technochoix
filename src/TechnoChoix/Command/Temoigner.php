<?php namespace TechnoChoix\Command;
use Symfony\Component\Validator\Constraints as Assert;

class Temoigner
{
    /**
     * @Assert\NotBlank()
     */
    public $client;
    /**
     * @Assert\NotBlank()
     */
    public $logo;
    /**
     * @Assert\NotBlank()
     */
    public $body;
}