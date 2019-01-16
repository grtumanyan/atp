<?php

namespace App\Controller;

use App\Entity\InteractiveSlider;
use App\Entity\InteractiveBottom;
use App\Entity\Ecogames;
use App\Entity\Magazine;
use App\Entity\VideosTop;
use App\Entity\VideosContent;
use App\Entity\TchaloContent;
use App\Entity\Treevia;
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
        $content = $this->getDoctrine()
            ->getRepository(Ecogames::class)
            ->findAll();

        return $this->render('interactive/ecogames.html.twig', [
            'content' => $content,
        ]);
    }

    /**
     * @Route("/bbmagazine", name="bbmagazine")
     */
    public function bbmagazine()
    {
        $content = $this->getDoctrine()
            ->getRepository(Magazine::class)
            ->findAll();

        return $this->render('interactive/bbmagazine.html.twig', [
            'content' => $content,
        ]);
    }

    /**
     * @Route("/videos", name="videos")
     */
    public function videos()
    {
        $top = $this->getDoctrine()
            ->getRepository(VideosTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(VideosContent::class)
            ->findAll();

        return $this->render('interactive/videos.html.twig', [
            'top' => $top,
            'content' => $content,
        ]);
    }

    /**
     * @Route("/tchalo", name="tchalo")
     */
    public function tchalo()
    {

        $content = $this->getDoctrine()
            ->getRepository(TchaloContent::class)
            ->findOneBy([], ['id'=>'DESC']);

        return $this->render('interactive/tchalo.html.twig', [
            'content' => $content,
        ]);
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
        $content = $this->getDoctrine()
        ->getRepository(Treevia::class)
        ->findAll();

        return $this->render('interactive/treevia.html.twig', [
            'content' => $content,
        ]);
    }
}