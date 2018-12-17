<?php

namespace App\Controller;

use App\Entity\InteractiveSlider;
use App\Entity\InteractiveBottom;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Form\Extension\Core\Type;

class InteractiveController extends AbstractController
{
    /**
     * @Route("/interactive", name="interactive")
     */
    public function interactive()
    {
        $slider = $this->getDoctrine()
            ->getRepository(InteractiveSlider::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(InteractiveBottom::class)
            ->findAll();

        return $this->render('interactive/interactive.html.twig', [
            'slider' => $slider,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/ecogames", name="ecogames")
     */
    public function ecogames()
    {
        return $this->render('interactive/ecogames.html.twig');
    }

    /**
     * @Route("/bbmagazine", name="bbmagazine")
     */
    public function bbmagazine()
    {
        return $this->render('interactive/bbmagazine.html.twig');
    }

    /**
     * @Route("/videos", name="videos")
     */
    public function videos()
    {
        return $this->render('interactive/videos.html.twig');
    }

    /**
     * @Route("/tchalo", name="tchalo")
     */
    public function tchalo()
    {
        return $this->render('interactive/tchalo.html.twig');
    }

    /**
     * @Route("/coloring", name="coloring")
     */
    public function coloring()
    {
        return $this->render('interactive/coloring.html.twig');
    }

    /**
     * @Route("/treevia", name="treevia")
     */
    public function treevia()
    {
        return $this->render('interactive/treevia.html.twig');
    }
}