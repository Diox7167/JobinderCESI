<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="accueil")
     */
    public function accueilAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/accueil.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/membre", name="membre")
     */
    public function membreAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/membre.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/resultats", name="resultats")
     */
    public function resultatsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/resultats.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
