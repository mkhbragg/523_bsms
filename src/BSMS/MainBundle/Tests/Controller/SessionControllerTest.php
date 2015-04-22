
<?php

// src/AppBundle/Tests/Controller/SessionControllerTest.php
namespace BSMS\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SessionControllerTest extends WebTestCase
{
    public function testCheckSession(){ 
    	if(isset($_SESSION['onyen'])){ 
    		return true 
    	} else { 
    		return false 
    	} 

    }
}