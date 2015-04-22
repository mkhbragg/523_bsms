<?php

// src/AppBundle/Tests/Controller/PostControllerTest.php
namespace BSMS\MainBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdministratorControllerTest extends WebTestCase
{
    public function testShowAdminView()
    {
        include 'opendb.php';
		$result = mysql_query(""select Username from Admins"");
		$row = mysql_fetch_array($result);
		while($row = mysql_fetch_array($result))
		{
    		if($row['Username'] == $_SESSION['onyen']){
        		return true
    		} else {
        		return false;
    		}
		}
    }

    public function testChangeAdvisors()
    { 
    	if (!strcmp(stripslashes($row["Advisor1"]), $_SESSION["user"]) || 
    		!strcmp(stripslashes($row["Advisor2"]), $_SESSION["user"]))
    	{ 
    		return true; 
    	} else { 
    		return false; 
    	} 
    }
}