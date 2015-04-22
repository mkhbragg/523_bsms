<?php

namespace BSMS\MainBundle\Controller;

use Doctrine\DBAL\DriverManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BSMS\MainBundle\Entity\Application;

class AdministratorController extends Controller{

	public function showAction($pid){
		session_start();
		if(isset($_POST['onyen'])){
			$_SESSION['onyen'] = $_POST['onyen'];
			$onyen = $_SESSION['onyen'];
		}
		if(!isset($_SESSION['onyen'])){
			header("Location: login.php");
		} 

		$config = new \Doctrine\DBAL\Configuration();
		$connectionParams = array(
		    'dbname' => 'BSMSdb',
		    'user' => 'test',
		    'password' => 'test',
		    'host' => 'localhost',
		    'driver' => 'pdo_mysql',
		);

		$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
		$qb = $conn->createQueryBuilder();
		$applicant = $qb
			->select('*')
			->from('Applications', 'A')
			->where('A.pid = :identifier')
   			->setParameter('identifier', $pid)
   			->execute()->fetch();

   		return $this->render('BSMSMainBundle:Custom:adminIndividualView.html.twig', array('isAdvisor'=>false,'isAdmin'=>true, 'applicant'=>$applicant));


	}

	public function renderQuestionsAction(){
		return $this->render('BSMSMainBundle:Custom:questions.html.twig');

	}
}