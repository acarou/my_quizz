<?php

namespace QuizzBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use OC\PlatformBundle\Entity\categorie;
use OC\PlatformBundle\Entity\question;
use OC\PlatformBundle\Entity\reponse;
use Symfony\Component\Form\Extension\Core\Type\FormType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ReponseController extends Controller
{
    /**
     * @Route("/form")
     */
   /* public function formAction()
    {
      // $reponse = new reponse();
    	$question = new question;
    	
		//$id = $request->query->get('ID');

    	 	$em = $this->getDoctrine()->getManager();


    // On récupère l'annonce $id

    $reponse = $em->getRepository('OCPlatformBundle:reponse')->find($question->getIdQuestion());
    


    if (null === $reponse) {

      throw new NotFoundHttpException("La categorie n'existe pas.");

    }


    // On récupère la liste des candidatures de cette annonce

    $listReponse = $em->getRepository('OCPlatformBundle:reponse')->findBy(array('idCategorie' => $categorie->getId()))

    ;


    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $Listreponse);


    $formBuilder

          ->add('reponse',    CheckboxType::class)
	 ;

   $form = $formBuilder->getForm();


    return $this->render('OCPlatformBundle:Quizz:form.html.twig', array(

      'form' => $form->createView(),

    ));
  }

  public function testAction()
  {
  	$em = $this->getDoctrine()->getManager();


    // On récupère l'annonce $id

    $categorie = $em->getRepository('OCPlatformBundle:categorie')->find($id);
    


    if (null === $categorie) {

      throw new NotFoundHttpException("La categorie n'existe pas.");

    }


    // On récupère la liste des candidatures de cette annonce

    $listQuestions = $em->getRepository('OCPlatformBundle:question')->findBy(array('idCategorie' => $categorie->getId()))

    ;


    return $this->render('OCPlatformBundle:Quizz:view.html.twig', array(

      'categorie'           => $categorie,

      'listQuestions' => $listQuestions

    ));
  }*/

}
