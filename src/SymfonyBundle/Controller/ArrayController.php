<?php

namespace SymfonyBundle\Controller;

use AppBundle\Entity\Entite;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArrayController extends Controller
{


	public function crrreateAction()
	{
		$repository = $this->getDoctrine()->getRepository('AppBundle:Entite');

		$listEntites = $repository->findAll();

		return $this->render('SymfonyBundle:Default:array.html.twig',array('listEntites'=>$listEntites));
	}
 }
?>