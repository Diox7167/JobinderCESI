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
    public function editUsersAction(Request $request, User $user)
    {

        $form = $this->createFormBuilder($user)
            ->add('email', TextType::class,array('label' => 'Email'))
            ->add('username', TextType::class,array('label' => 'Username'))
            ->add('roles',ChoiceType::class,[
                'multiple'       => true,
                'expanded'       => true,
                'choices'        => [
                    'admin'      => 'ROLE_ADMIN',
                    'user'       => 'ROLE_USER',
                    'moderator'  => 'ROLE_MORDERATOR'
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

    /**
     * @Route("/showUser/{id}", name="showUser")
     */
    public function showUsersAction(User $user)
    {
        $form = $this->createFormBuilder(UserType::class, $user);
        //Recuperation du user courant


        return $this->render('user/showUsers.html.twig', array([
            'user' => $user,
            'form' => $form
        ]));
    }

    /**
     * @Route("/denied}", name="denied")
     */
    public function deniedAction()
    {
        return $this->render('default/denied.html.twig');
    }



}
