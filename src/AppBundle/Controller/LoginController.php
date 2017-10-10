<?php
// src/AppBundle/Controller/LoginController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class LoginController
{
    /**
     * @Route("/login/index")
     */
    public function indexAction()
    {
        return new Response(
            '<html><body>Login</body></html>'
        );
    }
}