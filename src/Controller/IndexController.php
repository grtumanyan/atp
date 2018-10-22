<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        //// The second parameter is used to specify on what object the role is tested.
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $user = $this->getUser();

        $name = 'Index';
        return $this->render('index/index.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/backyard", name="backyard")
     */
    public function backyardNurseries()
    {
        //// The second parameter is used to specify on what object the role is tested.
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $user = $this->getUser();

        $name = 'backyardNurseries';
        return $this->render('index/backyard-nurseries.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/community", name="community")
     */
    public function community()
    {
        //// The second parameter is used to specify on what object the role is tested.
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $user = $this->getUser();

        $name = 'community';
        return $this->render('index/community.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/fruit", name="fruit")
     */
    public function fruitHarvesting()
    {
        //// The second parameter is used to specify on what object the role is tested.
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $user = $this->getUser();

        $name = 'fruit-harvesting';
        return $this->render('index/fruit-harvesting.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/news", name="news")
     */
    public function news()
    {
        //// The second parameter is used to specify on what object the role is tested.
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $user = $this->getUser();

        $name = 'news';
        return $this->render('index/news.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/single", name="single")
     */
    public function singleNews()
    {
        //// The second parameter is used to specify on what object the role is tested.
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $user = $this->getUser();

        $name = 'single-news';
        return $this->render('index/single-news.html.twig', [
            'name' => $name,
        ]);
    }

    /**
     * @Route("/impact", name="impact")
     */
    public function impact()
    {
        //// The second parameter is used to specify on what object the role is tested.
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $user = $this->getUser();

        $name = 'single-news';
        return $this->render('index/impact.html.twig', [
            'name' => $name,
        ]);
    }
}
