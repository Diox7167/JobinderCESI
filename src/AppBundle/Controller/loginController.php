<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;

use AppBundle\Form\UserType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
     * @Route("/user/display", name="display")
     */
    public function displayUsersAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        if (!$users) {
            throw $this->createNotFoundException(
                'Pas de données dans la base '
            );
        }

        return $this->render('user/allUsers.html.twig', array('data' => $users));
    }

    /**
     * @Route("/user/edit/{id}", name="editUser")
     */
    public function editUsersAction(Request $request, User $user)
    {

        $form = $this->createFormBuilder($user)
            ->add('email', TextType::class,array('label' => 'Email', 'disabled' => true))
            ->add('username', TextType::class,array('label' => 'Username', 'disabled' => true))
            ->add('roles',ChoiceType::class,[
                'multiple'       => true,
                'expanded'       => true,
                'choices'        => [
                    'admin'      => 'ROLE_ADMIN',
                    'user'       => 'ROLE_USER',
                    'moderator'  => 'ROLE_MODERATOR'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           $user = $form->getData();
           $em = $this->getDoctrine()->getManager();
           $post = $em->getRepository('AppBundle:User')->find($user->getId());
           $post->setUsername($user->getUsername());
           $post->setEmail($user->getEmail());
           //ici gerer les roles
           $em->flush();

            $users = $this->getDoctrine()
                ->getRepository('AppBundle:User')
                ->findAll();

            return $this->render('user/allUsers.html.twig', array('data'=>$users));
        }

        return $this->render('user/editUser.html.twig', array('form' => $form->createView(),
        ));

    }


    /**
     * @Route("/user/deleteUser/{id}", name="deleteUser")
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

    /**
     * @Route("/user/show/{id}", name="showUser")
     */
    public function showUsersAction(User $user)
    {

        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AppBundle:User')->find($user->getId());
        //ici gerer les roles
        $em->flush();


        return $this->render('default/membre.html.twig', array(
            'user' => $post
        ));
    }

    /**
     * @Route("/denied}", name="denied")
     */
    public function deniedAction()
    {
        return $this->render('default/denied.html.twig');
    }



}
