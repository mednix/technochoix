<?php namespace TechnoChoix;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @DI\Service("techno_choix.entity.societe", public=true)
 * @ORM\Entity
 * @ORM\Table(name="societes")
 */
class Societe
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     */
    private $nom;
    /**
     * @ORM\Column(type="string")
     */
    private $telephone;
    /**
     * @ORM\Column(type="string")
     */
    private $fax;
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $adresse;
    /**
     * @ORM\Column(type="string")
     */
    private $facebook;
    /**
     * @ORM\Column(type="string")
     */
    private $twitter;
    /**
     * @ORM\Column(type="string")
     */
    private $googlePlus;

}