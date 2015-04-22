<?php
namespace BSMS\MainBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BSMS\MainBundle\Entity\Application;
use BSMS\MainBundle\Entity\Admin;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BSMS\MainBundle\Form\Type\ApplicationType;

class ApplicationController extends Controller
{
    public function newAction($onyen, Request $request)
    {
        // create a task and give it some dummy data for this exampl
        $application = new Application();
        $form = $this->createForm(new ApplicationType(), $application);
        $form->handleRequest($request);

        if ($form->isValid()) {
            //... perform some action, such as saving the task to the database
            if($form->get('submit')->isClicked()){
                $pid = $application->getPid();
                $status = $application->setStatus('O');
                $application->setReceived(date_create(null));
                $application->setOnyen($onyen);

                $em = $this->getDoctrine()->getManager();
                $em->persist($application);
                $em->flush();

                return $this->render('BSMSMainBundle:Custom:application_success.html.twig', array('pid'=>$pid, 'onyen'=>$onyen));
            } 
        }
        return $this->render('BSMSMainBundle:Custom:applicant.html.twig', array('form' => $form->createView()));;
    }

    public function profileRedirectAction($onyen){
        return $this->render('BSMSMainBundle:Custom:applicant_profile.html.twig', array('onyen'=>$onyen));
    }

    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        // ... do something, like pass the $product object into a template
    }
}