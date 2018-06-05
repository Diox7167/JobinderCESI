<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class loginController extends Controller
{

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(Request $request)
    {

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('pseudo', TextType::class,array('label' => 'Name'))
            ->add('mdp', TextType::class, array('label' => 'Password'))
            ->add('Adress', TextType::class, array('label' => 'Email'))
            ->add('Register',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $pseudo = $request->request->get('pseudo',$user->getPseudo());
            $mdp = $request->request->get('mdp',$user->getMDP());
            $email = $request->request->get('Adress',$user->getAdress());


            $userInsert = new User();
            $userInsert->setPseudo($pseudo);
            $userInsert->setMdp($mdp);
            $userInsert->setAdress($email);

            $doct = $this->getDoctrine()->getManager();
            $doct->persist($userInsert);
            $doct->flush();


            return new Response('Vous etes inscrit : ' . $request->request->get('pseudo',$userInsert->getPseudo()));
        }


        return $this->render('default/inscription.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexionAction(Request $request)
    {
        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('pseudo', TextType::class,array('label' => 'Name'))
            ->add('mdp', TextType::class, array('label' => 'Password'))
            ->add('Log In',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        // Traitement des données du formulaire
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $userin = $this->getDoctrine()
                ->getRepository('AppBundle:User')
                ->find( $request->request->get('id',$user->getID()));

            return new Response('User is in database: '.$userin->getPseudo());
        }


        return $this->render('user/connexion.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/display", name="display")
     */
    public function displayUsersAction(Request $request)
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        return $this->render('user/allUsers.html.twig', array('data' => $users));
    }



}
