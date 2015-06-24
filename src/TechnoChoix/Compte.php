<?php
namespace TechnoChoix;

use FOS\UserBundle\Entity\User as BaseUser;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @DI\Service("techno_choix.entity.compte", public=true)
 * @ORM\Entity
 * @ORM\Table(name="comptes")
 */
class Compte extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    public function __construct()
    {
        parent::__construct();
        //
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}