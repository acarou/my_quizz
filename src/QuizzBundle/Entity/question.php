<?php

namespace QuizzBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="QuizzBundle\Repository\questionRepository")
 */
class question
{
      /**

   * @ORM\ManyToOne(targetEntity="OC\PlatformBundle\Entity\categorie")

   * @ORM\JoinColumn(nullable=false)

   */


    /**
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
     * @ORM\Column(name="id_categorie", type="integer")
     */
    private $idCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    private $categorie;
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
     * Set idCategorie
     *
     * @param integer $idCategorie
     *
     * @return question
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    /**
     * Get idCategorie
     *
     * @return int
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return question
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }


    public function setCategorie(categorie $categorie)
    {

    $this->categorie = $categorie;


    return $this;

   }


  public function getCategorie()

  {

    return $this->categorie;

  }
}

