<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\News;
use App\Entity\NewsImages;
use App\Entity\NewsPanel;
use App\Entity\LandingSlider;
use App\Entity\LandingBottom;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="index")
     */
    public function index()
    {
        $slider = $this->getDoctrine()
            ->getRepository(LandingSlider::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(LandingBottom::class)
            ->findAll();

        return $this->render('index/index.html.twig', [
            'slider' => $slider,
            'bottom' => $bottom,
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
     * @Route("/news/{page}", name="news")
     */
    public function news()
    {
        $request = Request::createFromGlobals();
        $page = $request->query->get('page', 1);

        $entityManager = $this->getDoctrine()->getManager();

        $queryBuilder = $entityManager->createQueryBuilder();

        $result = $queryBuilder->select('n')
            ->from(News::class, 'n')
            ->orderBy('n.id', 'DESC')
            ->getQuery();

        $adapter = new DoctrineORMAdapter($result);
        $pager =  new Pagerfanta($adapter);
        $pager->setMaxPerPage(2);
        try  {
            $pager->setCurrentPage($page);
        }
        catch(NotValidCurrentPageException $e) {
            throw new NotFoundHttpException('Illegal page');
        }
        return $this->render('index/news.html.twig', array(
            'pager' => $pager,
        ));
    }

    /**
     * @Route("/single/{id}", name="single")
     */
    public function singleNews()
    {
        $request = Request::createFromGlobals();
        $id = $request->query->get('id');

        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findOneById($id);
        $images = $this->getDoctrine()
            ->getRepository(NewsImages::class)
            ->findBy(array('news_id' => $id));
        $texts = $this->getDoctrine()
            ->getRepository(NewsPanel::class)
            ->findBy(array('news_id' => $id));

        return $this->render('index/single-news.html.twig', [
            'news' => $news,
            'images' => $images,
            'texts' => $texts,
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

    /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        $news = $this->getDoctrine()
            ->getRepository(News::class)
            ->findAll();

        return $this->render('index/test.html.twig', [
            'news' => $news,
        ]);
    }
}