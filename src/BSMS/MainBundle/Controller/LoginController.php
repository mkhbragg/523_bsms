<?php

namespace BSMS\MainBundle\Controller;

use Doctrine\DBAL\DriverManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BSMS\MainBundle\Entity\Application;

class LoginController extends Controller{

	public function loginAction(){
        session_start();
        if(isset($_SESSION['onyen'])) {
            header("Location: index.php");
        }

        return $this->render('BSMSMainBundle:Custom:login.html.twig');
    }

    public function portalAction(){

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
		$result = $qb
			->select('access')
			->from('Admins', 'A')
			->where('A.username = :identifier')
   			->setParameter('identifier', $_SESSION['onyen'])
   			->execute()->fetch();

		//if true, not a student
		if($result){
			//select advisees
			$qb = $conn->createQueryBuilder();
			$advisees = $qb
				->select('*')
				->from('Applications', 'a')
				->where(
					$qb->expr()->orX(
					$qb->expr()->eq('a.advisor1',':adv'),
					$qb->expr()->eq('a.advisor2',':adv'))
					)
		   		->setParameter('adv', $_SESSION['onyen'])
		   		->execute()->fetchAll();

		   	$qb = $conn->createQueryBuilder();
			$advisor1 = $qb
				->select('advisor1')
				->from('Applications', 'a')
				->where('a.advisor1 = :adv')
		   		->setParameter('adv', $_SESSION['onyen'])
		   		->execute()->fetchAll();

			if($result['access']==1){
				//administrator
				$qb = $conn->createQueryBuilder();
				$applicants = $qb
					->select('*')
					->from('Applications', 'a')
			   		->execute()->fetchAll();

				return $this->render('BSMSMainBundle:Custom:portal.html.twig', array('onyen'=>$onyen, 'isAdvisor'=>false,'isAdmin'=>true, 'applicants'=>$applicants));

			}else{
				//advisor
				if($advisor1==null){
					$isAdvisor1 = false;
				}
				else{
					$isAdvisor1 = true;
				}
				return $this->render('BSMSMainBundle:Custom:portal.html.twig', array('onyen'=>$onyen, 'isAdvisor'=>true, 'isAdmin'=>false, 'advisees'=>$advisees, 'isAdvisor1'=>$isAdvisor1));

			}
		} else {
			//student

			//see if student has already submitted an application
			$qb = $conn->createQueryBuilder();
			$student = $qb
				->select('onyen')
				->from('Applications', 'a')
				->where('a.onyen = :adv')
		   		->setParameter('adv', $_SESSION['onyen'])
		   		->execute()->fetchAll();

		   	if($student == null){
		   		//student has not submitted an application
		   		$isNewApplicant = true;
		   	}
		   	else{
		   		//student has submitted an application
		   		$isNewApplicant = false;
		   	}

			return $this->render('BSMSMainBundle:Custom:portal.html.twig', array('onyen'=>$onyen, 'isAdvisor'=>false, 'isAdmin'=>false, 'isNewApplicant'=>$isNewApplicant));

		}

    }
}