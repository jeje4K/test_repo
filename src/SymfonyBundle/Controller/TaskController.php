<?php

namespace SymfonyBundle\Controller;

use SymfonyBundle\Entity\Task;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TaskController extends Controller
{
	public function newAction(Request $request)
	{
		$task = new Task();
		$task->setTask('Write a blog post');
		$task->setDueDate(new \DateTime('tomorrow'));

		$form = $this->createFormBuilder($task)
				->add('task',TextType::class)
				->add('dueDate', DateType::class, array('label' => 'Date', 'widget' => 'single_text','required' => true))
				->add('save', SubmitType::class, array('label' => 'Create Task'))
				->getForm();

		$form->handleRequest($request);
		
		if($form->isSubmitted() && $form->isValid()){
			$em = $this->getDoctrine()->getManager();
			$em->persist($task);
			$em->flush();
		}		

		return $this->render('SymfonyBundle:Default:new.html.twig',array('form' => $form->createView(),));	
	}
}


?>