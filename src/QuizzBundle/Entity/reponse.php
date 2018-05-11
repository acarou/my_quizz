<?php

namespace QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="QuizzBundle\Repository\reponseRepository")
 */
class reponse
{
    /**
    * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\question")
     * @var int
     *

     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_question", type="integer")
     */
    private $idQuestion;

    /**
     * @var string
     *
     * @ORM\Column(name="reponse", type="string", length=255)
     */
    private $reponse;

    /**
     * @var int
     *
     * @ORM\Column(name="reponse_expected", type="integer")
     */
    private $reponseExpected;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idQuestion
     *
     * @param integer $idQuestion
     *
     * @return reponse
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    /**
     * Get idQuestion
     *
     * @return int
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    /**
     * Set reponse
     *
     * @param string $reponse
     *
     * @return reponse
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return string
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set reponseExpected
     *
     * @param integer $reponseExpected
     *
     * @return reponse
     */
    public function setReponseExpected($reponseExpected)
    {
        $this->reponseExpected = $reponseExpected;

        return $this;
    }

    /**
     * Get reponseExpected
     *
     * @return int
     */
    public function getReponseExpected()
    {
        return $this->reponseExpected;
    }

     public function addAction(Request $request)

  {

    // On crée un objet Advert

    $reponse = new reponse();


    // On crée le FormBuilder grâce au service form factory

    $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $reponse);


    // On ajoute les champs de l'entité que l'on veut à notre formulaire

    $formBuilder


      ->add('reponse',    TextType::class)

     

    ;

    // Pour l'instant, pas de candidatures, catégories, etc., on les gérera plus tard


    // À partir du formBuilder, on génère le formulaire

    $form = $formBuilder->getForm();


    // On passe la méthode createView() du formulaire à la vue

    // afin qu'elle puisse afficher le formulaire toute seule

    return $this->render('OCPlatformBundle:Quizz:view.html.twig', array(

      'form' => $form->createView(),

    ));

  }
}

