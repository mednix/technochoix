<?php namespace AppBundle;
use JMS\DiExtraBundle\Annotation as DI;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Doctrine\ORM\EntityManager;
use TechnoChoix\Visite;

/**
 * @DI\Service
 * @DI\Tag("kernel.event_listener", attributes={"event"="kernel.request", "method"="onKernelRequest"})
 */
class VisiteListener
{
    private $em;
    /**
     * @DI\InjectParams({
     *     "em" = @DI\Inject("doctrine.orm.entity_manager"),
     * })
     */
    public function __construct(EntityManager $em){
        $this->em=$em;
    }
    public function onKernelRequest(GetResponseEvent $event){
        $route=$event->getRequest()->get('_route');
        if(strpos($route, 'frontend')==false){
            $visite=new Visite();
            $this->em->persist($visite);
        }
    }

}