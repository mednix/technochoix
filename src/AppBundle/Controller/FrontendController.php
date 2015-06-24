<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\DiExtraBundle\Annotation as DI;

use TechnoChoix\DemandeDevis;
use TechnoChoix\Client;
use TechnoChoix\Repository\DemandesDevis;
use TechnoChoix\Repository\Clients;
use TechnoChoix\Form\FaireDemandeDevisType;
use TechnoChoix\Command\FaireDemandeDevis;
class FrontendController extends Controller
{
    /**
     * @Route("/", name="frontend_index")
     */
    public function indexAction()
    {
        $articles=$this->get('techno_choix.repository.articles')->trouverTous();
        $societe=$this->get('techno_choix.repository.societes')->getSociete();
        $temoignages=$this->get('techno_choix.repository.temoignages')->trouverTous();
        $produits=$this->get('techno_choix.repository.produits')->trouverTous();

        return $this->render('frontend/index.twig',[
            'articles'  => $articles,
            'societe'   => $societe,
            'temoignages'=> $temoignages,
            'produits'=> $produits
        ]);
    }
     /**
     * @Route("/article/{slug}", name="frontend_article")
     */
    public function articleAction($slug)
    {
        return $this->render('frontend/article.twig');
    }
     /**
     * @Route("/devis", name="frontend_devis")
     */
    public function devisAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $request=$this->getRequest()->request;
        $validator=$this->get('validator');
        $demandes=$this->get('techno_choix.repository.demandes_devis');
        $clients=$this->get('techno_choix.repository.clients');

        $command=new FaireDemandeDevis();
        $command->nom=$request->get('nom');
        $command->telephone=$request->get('telephone');
        $command->demande=$request->get('demande');

        $erreurs=$validator->validate($command);
        if(count($erreurs) > 0) {
            return $this->render('frontend/partials/erreurs.twig', compact('erreurs'));
        }
        if (count($erreurs) == 0) {
            
            $client=$clients->trouverParTelephone($command->telephone);
            if($client==null) {
                $client=Client::nouveau($command->nom, $command->telephone);
                $em->persist($client);
            }
            $demande=$client->faireDemandeDevis($command->demande);
            $em->persist($demande);
            
            $em->flush();
            
            $session->getFlashBag()->add('message', 'Merci, votre demande de devis a bien été envoyée. Nous vous remercions de l\'intérêt que vous portez à notre société. Nous traiterons votre demande dans les plus brefs délais.');
            return $this->render('frontend/partials/message.twig');
        }
        
            
    }
}
