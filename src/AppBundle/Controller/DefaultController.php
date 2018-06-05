<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('pseudo', TextType::class,array('label' => 'Name'))
            ->add('mdp', TextType::class, array('label' => 'Password'))
            ->add('Log In',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            return new Response('Pseudo : ' . $request->request->get('pseudo',$user->getPseudo()));
        }


        return $this->render('default/accueil.html.twig', array(
            'form' => $form->createView(),
        ));

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
