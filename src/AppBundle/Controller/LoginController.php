<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\User;
use AppBundle\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;


class LoginController extends Controller
{
    /**
     * @Route("/login", name="login_form")
     */
    public function indexAction(Request $request)
    {
        
        $form = $this->createForm(User::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $userData = $form->getData();    
            $member = new Member();
            $member->setUsername($userData['username']);
            $member->setPassword($userData['password']);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($member);
            $em->flush();
        }
        return $this->render('login/index.twig',['form' => $form->createView()]);
    }
    
    /**
     * 
     * @Route(
     *      "/list{page}", 
     *      name="user_list", 
     *      requirements={"page":"\d+"}
     * )
     */
    public function listAction($page = 1)
    {
        $repository = $this->getDoctrine()->getRepository(Member::class);        
        $members = $repository->findAll();
        echo '<pre>';
        print_r($members);
        
        return $this->render('login/list.twig');
    }
}