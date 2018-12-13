<?php

namespace App\Controller;

use App\Entity\DonationBottom;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Donation;
use App\Entity\News;
use App\Entity\NewsImages;
use App\Entity\NewsPanel;
use App\Entity\LandingSlider;
use App\Entity\LandingContent;
use App\Entity\LandingSections;
use App\Entity\LandingBottom;
use App\Entity\EventsTop;
use App\Entity\WhereTop;
use App\Entity\WhereFeatured;
use App\Entity\BackyardTop;
use App\Entity\BackyardContent;
use App\Entity\BackyardFeatured;
use App\Entity\MissionTop;
use App\Entity\MissionContent;
use App\Entity\MissionFeatured;
use App\Entity\EconomicTop;
use App\Entity\EconomicContent;
use App\Entity\EconomicFeatured;
use App\Entity\EducationTop;
use App\Entity\EducationContent;
use App\Entity\EducationFeatured;
use App\Entity\EmpoweringTop;
use App\Entity\EmpoweringContent;
use App\Entity\EmpoweringFeatured;
use App\Entity\OhanianTop;
use App\Entity\OhanianTopContent;
use App\Entity\OhanianBottomContent;
use App\Entity\BridgesTop;
use App\Entity\BridgesContent;
use App\Entity\BridgesFeatured;
use App\Entity\BridgesContentTop;
use App\Entity\VolunteerTop;
use App\Entity\VolunteerContent;
use App\Entity\KidsTop;
use App\Entity\KidsContent;
use App\Entity\KidsFeatured;
use App\Entity\FruitTop;
use App\Entity\FruitContent;
use App\Entity\FruitSlider;
use App\Entity\FruitSliderImages;
use App\Entity\FruitFeatured;
use App\Entity\ImpactTop;
use App\Entity\CommunityTop;
use App\Entity\CommunityContent;
use App\Entity\CommunityFocus;
use App\Entity\CommunityFeatured;
use App\Entity\TreeTop;
use App\Entity\TreeContent;
use App\Entity\ForestationTop;
use App\Entity\ForestationContent;
use App\Entity\ForestationFeatured;
use App\Entity\Amount;
use App\Entity\AmbassadorTop;
use App\Entity\AmbassadorContent;
use App\Entity\AmbassadorFeatured;
use App\Entity\AmbassadorContentTop;
use App\Entity\TeamBranches;
use App\Entity\TeamMember;
use App\Entity\TeamTop;
use App\Entity\TeamMain;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Form\Extension\Core\Type;
use App\Service\Eventbrite;

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

        $sections = $this->getDoctrine()
            ->getRepository(LandingSections::class)
            ->findAll();

        $content = $this->getDoctrine()
            ->getRepository(LandingContent::class)
            ->findOneBy([], ['id'=>'DESC']);

        $bottom = $this->getDoctrine()
            ->getRepository(LandingBottom::class)
            ->findAll();

        return $this->render('index/index.html.twig', [
            'slider' => $slider,
            'content' => $content,
            'sections' => $sections,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/backyard", name="backyard")
     */
    public function backyardNurseries()
    {
        $top = $this->getDoctrine()
            ->getRepository(BackyardTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(BackyardContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(BackyardFeatured::class)
            ->findAll();

        return $this->render('index/backyard-nurseries.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/community", name="community")
     */
    public function community()
    {
        $item = $this->getDoctrine()
            ->getRepository(CommunityTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(CommunityContent::class)
            ->findOneBy([], ['id'=>'DESC']);

        $focus = $this->getDoctrine()
            ->getRepository(CommunityFocus::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(CommunityFeatured::class)
            ->findAll();

        return $this->render('index/community.html.twig', [
            'item' => $item,
            'content' => $content,
            'focus' => $focus,
            'bottom' => $bottom
        ]);
    }

    /**
     * @Route("/fruit", name="fruit")
     */
    public function fruitHarvesting()
    {
        $top = $this->getDoctrine()
            ->getRepository(FruitTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(FruitContent::class)
            ->findOneBy([], ['id'=>'DESC']);

        $slider = $this->getDoctrine()
            ->getRepository(FruitSlider::class)
            ->findAll();

        $allImages = $this->getDoctrine()
            ->getRepository(FruitSliderImages::class)
            ->findAll();

        $images = [];
        foreach($allImages as $item){
            $images[$item->getSlider()->getId()][] = $item;
        }

        $bottom = $this->getDoctrine()
            ->getRepository(FruitFeatured::class)
            ->findAll();

        return $this->render('index/fruit-harvesting.html.twig', [
            'top' => $top,
            'content' => $content,
            'slider' => $slider,
            'images' => $images,
            'bottom' => $bottom,
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
            ->orderBy('n.date_created', 'DESC')
            ->getQuery();

        $adapter = new DoctrineORMAdapter($result);
        $pager =  new Pagerfanta($adapter);
        $pager->setMaxPerPage(4);
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
        $item = $this->getDoctrine()
            ->getRepository(ImpactTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        return $this->render('index/impact.html.twig', [
            'item' => $item,
        ]);
    }

    /**
     * @Route("/economic", name="economic")
     */
    public function economic()
    {
        $top = $this->getDoctrine()
        ->getRepository(EconomicTop::class)
        ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(EconomicContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(EconomicFeatured::class)
            ->findAll();

        return $this->render('index/economic.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/tree", name="tree")
     */
    public function tree()
    {
        $top = $this->getDoctrine()
        ->getRepository(TreeTop::class)
        ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(TreeContent::class)
            ->findOneBy([], ['id'=>'DESC']);

        return $this->render('index/tree.html.twig', [
            'top' => $top,
            'content' => $content,
        ]);
    }

    /**
     * @Route("/forestation", name="forestation")
     */
    public function forestation()
    {
        $top = $this->getDoctrine()
        ->getRepository(ForestationTop::class)
        ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(ForestationContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(ForestationFeatured::class)
            ->findAll();

        return $this->render('index/forestation.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/donation", name="donation")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function donation(Request $request)
    {

        $amount = $this->getDoctrine()
            ->getRepository(Amount::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(DonationBottom::class)
            ->findAll();

        $form = $this->createFormBuilder()
            ->add('type', Type\ChoiceType::class, array(
                'choices'  => array(
                    'OneTime' => true,
                    'Plan' => false,
                )))
            ->add('amount', Type\HiddenType::class)
            ->add('firstName', Type\TextType::class)
            ->add('lastName', Type\TextType::class)
            ->add('country', Type\HiddenType::class)
            ->add('city', Type\TextType::class)
            ->add('state', Type\HiddenType::class)
            ->add('code', Type\NumberType::class)
            ->add('email', Type\EmailType::class)
            ->add('address', Type\TextType::class)
            ->add('phone', Type\NumberType::class)
            ->add('employer', Type\TextType::class, ['required' => false])
//            ->add('yes', Type\ButtonType::class)
//            ->add('no', Type\ButtonType::class)
            ->add('anonymous', Type\ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                )))
            ->add('certificate', Type\CheckboxType::class, ['required' => false])
            ->add('send', Type\SubmitType::class, ['label'=>'Donate now'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if(!isset($data['amount'])){
                return $this->render('index/donation.html.twig', [
                    'form' => $form->createView(),
                    'amount' => $amount,
                    'bottom' => $bottom,
                ]);
            }

            $entityManager = $this->getDoctrine()->getManager();

            $donation = new Donation();
            $donation->setFirstName($data['firstName']);
            $donation->setLastName($data['lastName']);
            $donation->setAmount($data['amount']);
            $donation->setCountry($data['country']);
            $donation->setCity($data['city']);
            $donation->setState($data['state']);
            $donation->setCode($data['code']);
            $donation->setEmail($data['email']);
            $donation->setAddress($data['address']);
            $donation->setPhone($data['phone']);
            $donation->setEmployer($data['employer']);
            if($data['anonymous'] == true){
                $donation->setAnonymous('Yes');
            }elseif($data['anonymous'] == false){
                $donation->setAnonymous('No');
            }
            if($data['certificate'] == true){
                $donation->setCertificate('Yes');
            }elseif($data['certificate'] == false){
                $donation->setCertificate('No');
            }
            if($data['type'] == true){
                $donation->setType('OneTime');
            }elseif($data['type'] == false){
                $donation->setType('Monthly');
            }

            // tell Doctrine you want to (eventually) save the donation (no queries yet)
            $entityManager->persist($donation);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            $defaultData = array('review' => true,
                'id' => $donation->getId(),
            );

            $form = $this->createFormBuilder($defaultData)
                ->add('submit', Type\SubmitType::class)
                ->getForm();

            $form->handleRequest($request);

            return $this->render('index/donation-review.html.twig', [
                'form' => $form->createView(),
                'donation' => $donation,
            ]);
        }

        return $this->render('index/donation.html.twig', [
            'form' => $form->createView(),
            'amount' => $amount,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/events", name="events")
     */
    public function events()
    {
        $eventbrite = new Eventbrite();
        $response = $eventbrite->getEvent();
        $events = $response['events'];

        for($i=0; $i<count($events); $i++){
            $venue = $eventbrite->getVenue($events[$i]['venue_id']);
            $events[$i]['venue'] = $venue;
        }

        $top = $this->getDoctrine()
            ->getRepository(EventsTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        return $this->render('index/events.html.twig', [
            'top' => $top,
            'events' => $events
        ]);
    }

    /**
     * @Route("/where", name="where")
     */
    public function where()
    {
        $top = $this->getDoctrine()
            ->getRepository(WhereTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $bottom = $this->getDoctrine()
            ->getRepository(WhereFeatured::class)
            ->findAll();

        return $this->render('index/where.html.twig', [
            'top' => $top,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/education", name="education")
     */
    public function education()
    {
        $top = $this->getDoctrine()
            ->getRepository(EducationTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(EducationContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(EducationFeatured::class)
            ->findAll();

        return $this->render('index/education.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/bridges", name="bridges")
     */
    public function bridges()
    {
        $top = $this->getDoctrine()
            ->getRepository(BridgesTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $topContent = $this->getDoctrine()
            ->getRepository(BridgesContentTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(BridgesContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(BridgesFeatured::class)
            ->findAll();

        return $this->render('index/bridges.html.twig', [
            'top' => $top,
            'content' => $content,
            'topContent' => $topContent,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/kids", name="kids")
     */
    public function kids()
    {
        $top = $this->getDoctrine()
            ->getRepository(KidsTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(KidsContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(KidsFeatured::class)
            ->findAll();

        return $this->render('index/kids.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/ohanian", name="ohanian")
     */
    public function ohanian()
    {

        $top = $this->getDoctrine()
            ->getRepository(OhanianTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $contentTop = $this->getDoctrine()
            ->getRepository(OhanianTopContent::class)
            ->findOneBy([], ['id'=>'DESC']);

        $contentBottom = $this->getDoctrine()
            ->getRepository(OhanianBottomContent::class)
            ->findAll();

        return $this->render('index/ohanian.html.twig', [
            'top' => $top,
            'contentTop' => $contentTop,
            'contentBottom' => $contentBottom,
        ]);
    }

    /**
     * @Route("/volunteer", name="volunteer")
     */
    public function volunteer()
    {
        $top = $this->getDoctrine()
            ->getRepository(VolunteerTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(VolunteerContent::class)
            ->findAll();

        return $this->render('index/volunteer.html.twig', [
            'top' => $top,
            'content' => $content
        ]);
    }

    /**
     * @Route("/ambassador", name="ambassador")
     */
    public function ambassador()
    {
        $top = $this->getDoctrine()
            ->getRepository(AmbassadorTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $topContent = $this->getDoctrine()
            ->getRepository(AmbassadorContentTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(AmbassadorContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(AmbassadorFeatured::class)
            ->findAll();

        return $this->render('index/ambassador.html.twig', [
            'top' => $top,
            'content' => $content,
            'topContent' => $topContent,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/empowering", name="empowering")
     */
    public function empowering()
    {
        $top = $this->getDoctrine()
            ->getRepository(EmpoweringTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(EmpoweringContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(EmpoweringFeatured::class)
            ->findAll();

        return $this->render('index/empowering-communities.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/mission", name="mission")
     */
    public function mission()
    {
        $top = $this->getDoctrine()
            ->getRepository(MissionTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(MissionContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(MissionFeatured::class)
            ->findAll();

        return $this->render('index/our-mission.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
        ]);
    }

    /**
     * @Route("/team", name="team")
     */
    public function team()
    {
        $top = $this->getDoctrine()
            ->getRepository(TeamTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $main = $this->getDoctrine()
            ->getRepository(TeamMain::class)
            ->findOneBy([], ['id'=>'DESC']);

        $branches = $this->getDoctrine()
            ->getRepository(TeamBranches::class)
            ->findAll(['branch_id'=>'DESC']);

        $members = $this->getDoctrine()
            ->getRepository(TeamMember::class)
            ->findAll();

        return $this->render('index/our-team.html.twig', [
            'top' => $top,
            'main' => $main,
            'branches' => $branches,
            'members' => $members,
        ]);
    }

    /**
     * @Route("/tour", name="tour")
     */
    public function tour()
    {
        return $this->render('index/tour.html.twig');
    }
}