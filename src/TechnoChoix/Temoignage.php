<?php namespace TechnoChoix;
use DateTime;
use JMS\DiExtraBundle\Annotation as DI;
use Doctrine\ORM\Mapping AS ORM;
/**
 * @DI\Service("techno_choix.entity.temoignage", public=true)
 * @ORM\Entity
 * @ORM\Table(name="temoignages")
 */
class Temoignage
{
     /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
     /**
     * @ORM\Column(type="string")
     */
    protected $client;
     /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $logo;
     /**
     * @ORM\Column(type="text")
     */
    protected $body;
    public function __construct($body='')
    {
        $this->body=$body;
    }
    public function temoigner($body)
    {
        $temoignage=new static($body);
        return $temoignage;
    }
    public function par($client)
    {
        $this->client=$client;
        return $this;
    }
    public function logo($logo)
    {
        $this->logo=$logo;
        return $this;
    }
}