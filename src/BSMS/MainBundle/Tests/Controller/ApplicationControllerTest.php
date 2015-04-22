

<?php

// src/AppBundle/Tests/Controller/ApplicationControllerTest.php
namespace BSMS\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdministratorControllerTest extends WebTestCase
{
    public function testSubmitApplication() { 
	    if (empty($_FILES['file1']['name']) || empty($_FILES['file2']['name']) || 
	    	empty($_FILES['file3']['name']) || strcmp($_POST["firstname"], "") || 
	    	strcmp($_POST["lastname"], "") || strcmp($_POST["email"], "") || 
	    	strcmp($_POST["pid"], "") || strcmp($_POST["gpa"], "") || 
	    	strcmp($_POST["advisor1"], "") || strcmp($_POST["advisor2"], "") || strcmp($_POST["term"], "")) { 
	    	return false 
	    } else { 
	    	return true 
	    }
   }
}