<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Entite;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EntiteController extends Controller
{
	/**
	 * @Route("/entite",name="entite")
	 */

	public function createAction()
	{
		$entite = new Entite();
		$entite->setName("Entite 1 ");
		$entite->setPrice('2.0');

		$em = $this->getDoctrine()->getManager();

		$em->persist($entite);
		$em->flush();

		$entite1 = new Entite();
		$entite1->setName("Entite 2");
		$entite1->setPrice("3.0");

		$em1 = $this->getDoctrine()->getManager();

		$em1->persist($entite1);
		$em1->flush();

		return new Response("Entite Nom : ".$entite->getName()." <br>2eme Entite Nom : ".$entite1->getName());
	}

	/**
	 * @Route("/entite/{id}", name="update_entite")
	 */

	public function crreateAction($id)
	{
		$entite = $this->getDoctrine()->getRepository('AppBundle:Entite')->find($id);

		if(!$entite)
		{
			throw $this->createNotFoundException('Entité non trouvée id : '.$id);
		}	

		return new Response("Entite : ".$entite->getName());
	}


	

}


?>