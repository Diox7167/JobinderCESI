<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Recherche;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RechercheController extends Controller{


   /**
    * @Route("/recherche", name="recherche")
    */
	public function rechercheAction(Request $request)
    {
    	$recherche = new Recherche();
    	$form = $this->createFormBuilder($recherche)
    		->add('city', TextType::class,array('label' => 'City'))
    		->add('job', TextType::class,array('label' => 'Job'))
    		->add('Submit',SubmitType::class)
    		->getForm();

    	$form->handleRequest($request);

    	if ($form->isSubmitted() && $form->isValid()) {
    		$recherche = $form->getData();
    		$city = $recherche->getCity();
    		$job = $recherche->getJob();

    		$jobinderResearch = new jobinderResearch();
    		$jsonResult = $jobinderResearch->getJobs($recherche);
    		$parsedResult = json_decode($jsonResult);

    		return $this->render('default/resultats.html.twig', array('result'=>$parsedResult));
    	}

    	return $this->render('default/recherche.html.twig', array('form' => $form->createView(),
    	));
    }
}



