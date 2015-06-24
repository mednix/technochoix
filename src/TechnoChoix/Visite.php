<?php namespace TechnoChoix;
use DateTime;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @DI\Service("techno_choix.entity.visite", public=true)
 * @ORM\Entity
 * @ORM\Table(name="visites")
 */
class Visite
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
    private $ip;
    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    public function __construct(){
        $this->date=new DateTime();
        $this->ip=$this->getIpReelle();
    }

    public function getIpReelle(){
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

}