<?php

namespace BSMS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BSMSMainBundle:Default:index.html.twig', array('name' => $name));
    }

    public function test2Action(){
        return $this->render('BSMSMainBundle:Custom:index.html.twig');
    }

    public function applicantAction(){
        return $this->render('BSMSMainBundle:Custom:applicant.html.twig');
    }

    public function loginAction(){
        session_start();
        if(isset($_SESSION['onyen'])) {
            header("Location: index.php");
        }

        return $this->render('BSMSMainBundle:Custom:login.html.twig');
    }

    public function portalAction(){
        $onyen = $_SESSION['onyen'];
        return $this->render('BSMSMainBundle:Custom:portal.html.twig', array('onyen'=>$onyen));
    }

    public function todoAction(){
        return $this->render('BSMSMainBundle:Custom:todo.html.twig');
    }
}
