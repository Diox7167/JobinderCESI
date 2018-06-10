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

        // replace this example code with whatever you need
        return $this->render('default/membre.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/connexion", name="connexion")
     */
    public function connexionAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/membre.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/display", name="display")
     */
    public function displayUsersAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        return $this->render('user/allUsers.html.twig', array('data' => $users));
    }

    /**
     * @Route("/edit/{id}", name="editUser")
     */
    public function editUsersAction(User $user)
    {

        return $this->redirectToRoute('fos_user_profile_edit');

    }

    /**
     * @Route("/deleteUser/{id}", name="deleteUser")
     */
    public function deleteUsersAction(User $user)
    {
        //Suppression du user courant
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();

        //actualiser la liste de users
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        return $this->render('user/allUsers.html.twig', array('data' => $users));
    }



}
