<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LoginController extends \Symfony\Component\HttpKernel\Tests\Controller
{
    /**
     * @Route("/login", name="login_form")
     */
    public function indexAction()
    {
//        return new Response(
//            '<html><body>Login</body></html>'
//        );
         $this->render('default/index.html.twig');
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
        return new Response(
            '<html><body>user list</body></html>'
        );
    }
}