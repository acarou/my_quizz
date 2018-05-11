<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace QuizzBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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


class QuizzController extends Controller
{
    static $i = 1;
    public static $j = 0;



  public function indexAction()
  {
  	
    return $this->render('@Quizz/Quizz/index.html.twig', array(

  'listQuizz' => array()

  ));

  }

     public function menuAction()

  {
      $repository = $this->getDoctrine()
    ->getManager()
    ->getRepository('QuizzBundle:categorie');

    $categorie = $repository->findAll();

     if (null === $categorie)
     {

      throw new NotFoundHttpException("La categorie n'existe pas.");
     }



    return $this->render('@Quizz/Quizz/menu.html.twig', array(

      'listCategorie' => $categorie

    ));

  }



    public function viewAction($id, Request $request)
  {
    
    
    $em = $this->getDoctrine()->getManager();
    $quest = "";

    $categorie = $em->getRepository('QuizzBundle:categorie')->find($id);

    
      if (null === $categorie) 
      {
        throw new NotFoundHttpException("La categorie n'existe pas.");
      }

      $listQuestions = $em->getRepository('QuizzBundle:question')->findBy(array('idCategorie' => $categorie->getId()));


      $listReponse = $em->getRepository('QuizzBundle:reponse')->findBy(array('idQuestion' =>$listQuestions[self::$j]->getId()));

      $verif = $em->getRepository('QuizzBundle:reponse')->findBy(array('idQuestion' =>$listQuestions[self::$j]->getId(), 'reponseExpected' => '1'));
      $true = $verif[0]->getReponse();



      $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $listReponse);

     $formBuilder
      ->add($listReponse[0]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[0]->getReponse(), 'label' => $listReponse[0]->getReponse()])
      ->add($listReponse[1]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[1]->getReponse(), 'label' => $listReponse[1]->getReponse()])
      ->add($listReponse[2]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[2]->getReponse(), 'label' => $listReponse[2]->getReponse()])
      ->add('Valider',      SubmitType::class);
    

      $test = $request->get("form");
  
      if ($request->get("form") == NULL)
      {
        $form = $formBuilder->getForm();

         return $this->render('@Quizz/Quizz/view.html.twig', array(

      'categorie'           => $categorie,

      'listQuestions' => $listQuestions[self::$j],

      'form' => $form->createView(),

      'result' => $quest,


      ));

     }

    else
    {
     
      foreach ($test as $key => $value) {
      if ($value == $true) 
      {
     
       ++self::$j;
       $listReponse = $em->getRepository('QuizzBundle:reponse')->findBy(array('idQuestion' =>$listQuestions[self::$j]->getId()));

      $verif = $em->getRepository('QuizzBundle:reponse')->findBy(array('idQuestion' =>$listQuestions[self::$j]->getId(), 'reponseExpected' => '1'));
      $true = $verif[0]->getReponse();
       $quest = "Bonne réponse!";
       var_dump(self::$j);
       $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $listReponse);

      $formBuilder
      ->add($listReponse[0]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[0]->getReponse(), 'label' => $listReponse[0]->getReponse()])
      ->add($listReponse[1]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[1]->getReponse(), 'label' => $listReponse[1]->getReponse()])
      ->add($listReponse[2]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[2]->getReponse(), 'label' => $listReponse[2]->getReponse()])
      ->add('Valider',      SubmitType::class);
      
       $form2 = $formBuilder->getForm();
       
        //var_dump($test);

        return $this->render('@Quizz/Quizz/view.html.twig', array(

      'categorie'           => $categorie,

      'listQuestions' => $listQuestions[self::$j],

      'form' => $form2->createView(),

      'result' => $quest,


      ));

    }

    else{
             
        ++self::$j;

        $listReponse = $em->getRepository('QuizzBundle:reponse')->findBy(array('idQuestion' =>$listQuestions[self::$j]->getId()));

        $verif = $em->getRepository('QuizzBundle:reponse')->findBy(array('idQuestion' =>$listQuestions[self::$j]->getId(), 'reponseExpected' => '1'));

        $true = $verif[0]->getReponse();

        $quest = "Mauvais réponse!";

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $listReponse);

        $formBuilder
      ->add($listReponse[0]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[0]->getReponse(), 'label' => $listReponse[0]->getReponse()])
      ->add($listReponse[1]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[1]->getReponse(), 'label' => $listReponse[1]->getReponse()])
      ->add($listReponse[2]->getReponse(),  CheckboxType::class, ['required' => false, 'value' => $listReponse[2]->getReponse(), 'label' => $listReponse[2]->getReponse()])
      ->add('Valider',      SubmitType::class);
             $form1 = $formBuilder->getForm();
             $test = $request->request->get('form1');
              //var_dump($test);
             //var_dump(self::$j);

             return $this->render('@Quizz/Quizz/view.html.twig', array(

      'categorie'           => $categorie,

      'listQuestions' => $listQuestions[self::$j],

      'form' => $form1->createView(),

      'result' => $quest,


      ));
      
        }
     }
   }

    return $this->render('@Quizz/Quizz/view.html.twig', array(

      'categorie'           => $categorie,

      'listQuestions' => $listQuestions[self::$j],

      'form' => $form->createView(),
      ));

    
  
  }



  public function viewSlugAction($slug, $year, $_format)

    {

        return new Response(

            "On pourrait afficher l'annonce correspondant au

            slug '".$slug."', créée en ".$year." et au format ".$_format."."

        );

    }

      public function addAction(Request $request)

  {

   

    $reponse = new reponse();



    $form = $this->get('form.factory')->createBuilder(FormType::class, $reponse)

    ->add($listReponse[0]->getReponse(),  CheckboxType::class)
    ->add($listReponse[1]->getReponse(),  CheckboxType::class)
    ->add($listReponse[2]->getReponse(),  CheckboxType::class)
    ->add('Valider',      SubmitType::class)

      ->getForm()

    ;


   

    if ($request->isMethod('POST')) {
      

     

      $form->handleRequest($request);




      if ($form->isValid()) {
       

      



        $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');


      

        return $this->redirectToRoute('oc_platform_view', array('id' => $advert->getId()));

      }

    }


   
    return $this->render('QuizzBundle:Advert:add.html.twig', array(

      'form' => $form->createView(),

    ));

  

  }

  



  
}