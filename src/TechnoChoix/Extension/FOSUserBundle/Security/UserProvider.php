<?php namespace TechnoChoix\Extension\FOSUserBundle\Security;

use JMS\DiExtraBundle\Annotation as DI;
use FOS\UserBundle\Security\UserProvider as BaseUserProvider;
use TechnoChoix\Repository\Comptes;


/**
 * @DI\Service("techno_choix.extension.fos_user_bundle.security.user_provider")
 */
class UserProvider extends BaseUserProvider
{

	private $comptes;
     /**
     * @DI\InjectParams({
     *     "comptes" = @DI\Inject("techno_choix.repository.comptes")
     * })
     */
	public function __construct(Comptes $comptes){
		$this->comptes=$comptes;
	}
    /**
     * {@inheritDoc}
     */
    protected function findUser($username)
    {
        //code
    }
}
