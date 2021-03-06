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
use App\Entity\Interest;
use App\Entity\MissionTop;
use App\Entity\MissionContent;
use App\Entity\MissionFeatured;
use App\Entity\EconomicTop;
use App\Entity\EconomicContent;
use App\Entity\EconomicFeatured;
use App\Entity\EducationTop;
use App\Entity\EducationContent;
use App\Entity\EducationContentBottom;
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
use App\Entity\Volunteer;
use App\Entity\VolunteerContent;
use App\Entity\KidsTop;
use App\Entity\KidsContent;
use App\Entity\KidsFeatured;
use App\Entity\FruitTop;
use App\Entity\FruitContent;
use App\Entity\FruitSlider;
use App\Entity\FruitSliderImages;
use App\Entity\FruitFeatured;
use App\Entity\StewardshipTop;
use App\Entity\StewardshipContent;
use App\Entity\StewardshipSlider;
use App\Entity\StewardshipSliderImages;
use App\Entity\StewardshipFeatured;
use App\Entity\VillageTop;
use App\Entity\VillageContent;
use App\Entity\VillageTopSlider;
use App\Entity\VillageTopSliderImages;
use App\Entity\VillageBottomSlider;
use App\Entity\VillageBottomSliderImages;
use App\Entity\VillageFeatured;
use App\Entity\ImpactTop;
use App\Entity\ImpactContent;
use App\Entity\ImpactBottom;
use App\Entity\CommunityTop;
use App\Entity\CommunityContent;
use App\Entity\CommunityFocus;
use App\Entity\CommunityModel;
use App\Entity\CommunityFeatured;
use App\Entity\TreeTop;
use App\Entity\TreeContent;
use App\Entity\TreeSections;
use App\Entity\TreeBottom;
use App\Entity\CampsTop;
use App\Entity\CampsContent;
use App\Entity\ForestationTop;
use App\Entity\ForestationContent;
use App\Entity\ForestationFeatured;
use App\Entity\MirakTop;
use App\Entity\MirakContent;
use App\Entity\MirakFeatured;
use App\Entity\LessonsTop;
use App\Entity\LessonsContent;
use App\Entity\LessonsFeatured;
use App\Entity\Amount;
use App\Entity\AmbassadorTop;
use App\Entity\AmbassadorContent;
use App\Entity\AmbassadorFeatured;
use App\Entity\AmbassadorContentTop;
use App\Entity\TeamBranches;
use App\Entity\TeamMember;
use App\Entity\TeamTop;
use App\Entity\TeamMain;
use App\Entity\TourTop;
use App\Entity\TourContent;
use App\Entity\TourBottom;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\Form\Extension\Core\Type;
use App\Service\Eventbrite;
use App\Service\SparkpostService as Sparkpost;
use Symfony\Component\HttpFoundation\Session\Session;

class IndexController extends AbstractController
{

    public $lang='eng';

    public function __construct()
    {
        $session = new Session();

        if($session->isStarted()){
            $session->start();
        }
        $lang = $session->get('lang');

        if(!isset($lang)){
            $session->set('lang', 'eng');
        }
        $this->lang = $session->get('lang');
    }

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
            'lang' => $this->lang,
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
            'lang' => $this->lang,
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

        $models = $this->getDoctrine()
            ->getRepository(CommunityModel::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(CommunityFeatured::class)
            ->findAll();

        return $this->render('index/community.html.twig', [
            'item' => $item,
            'content' => $content,
            'focus' => $focus,
            'bottom' => $bottom,
            'models' => $models,
            'lang' => $this->lang
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
            'lang' => $this->lang
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
            'lang' => $this->lang
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
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/impact", name="impact")
     */
    public function impact()
    {
        $top = $this->getDoctrine()
            ->getRepository(ImpactTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(ImpactContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(ImpactBottom::class)
            ->findAll();

        return $this->render('index/impact.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
            'lang' => $this->lang
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
            'lang' => $this->lang
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

        $bottom = $this->getDoctrine()
            ->getRepository(TreeBottom::class)
                ->findOneBy([], ['id'=>'DESC']);

        $sections = $this->getDoctrine()
            ->getRepository(TreeSections::class)
                ->findAll();

        return $this->render('index/tree.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
            'sections' => $sections,
            'lang' => $this->lang
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
            'lang' => $this->lang
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
            ->add('type', Type\HiddenType::class)
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
            ->add('anonymous', Type\ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                )))
            ->add('certificate', Type\CheckboxType::class, ['required' => false])
            ->add('send', Type\SubmitType::class, ['label'=>'Next'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if(!isset($data['amount'])){
                return $this->render('index/donation.html.twig', [
                    'form' => $form->createView(),
                    'amount' => $amount,
                    'bottom' => $bottom,
            'lang' => $this->lang
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
            $donation->setComments('Sample Description');
            $donation->setType($data['type']);

            $entityManager->persist($donation);

            $entityManager->flush();

            if($data['certificate'] == true){
                return $this->redirectToRoute('certificate', array('id' => $donation->getId()));
            }elseif($data['certificate'] == false){
                return $this->redirectToRoute('donateReview', array('id' => $donation->getId()));
            }
        }

        return $this->render('index/donation.html.twig', [
            'form' => $form->createView(),
            'amount' => $amount,
            'bottom' => $bottom,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/events", name="events")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function events(Request $request)
    {
        $eventbrite = new Eventbrite();
        $response = $eventbrite->getEvents();
        $events = $response['events'];

        for($i=0; $i<count($events); $i++){
            $venue = $eventbrite->getVenue($events[$i]['venue_id']);
            $events[$i]['venue'] = $venue;
        }

        $top = $this->getDoctrine()
            ->getRepository(EventsTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $form = $this->createFormBuilder()
            ->add('date', Type\TextType::class, ['required' => false])
            ->add('title', Type\TextType::class, ['required' => false])
            ->add('location', Type\TextType::class, ['required' => false])
            ->add('send', Type\SubmitType::class, ['label'=>'FIND EVENTS'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $new_events = [];
            foreach($events as $key => $event){

                $event_time = $event['start']['utc'];
                $date1 = strtotime($event_time);
                if(isset($data['date'])) {
                    $date2 = strtotime(explode(' to ', $data['date'])[0]);
                    $date3 = strtotime(explode(' to ', $data['date'])[1]);
                }

                if(isset($data['title'])){
                    if(strpos(strtolower ($event['name']['text']), strtolower ($data['title']) ) !== false) {
                        if(isset($data['location'])) {
                            if (strpos(strtolower($data['location']), strtolower($event['venue']['address']['city'])) !== false) {
                                if(isset($data['date'])) {
                                    if ($date1 > $date2 && $date1 < $date3)
                                    {
                                        $new_events[]= $event;
                                        continue;
                                    }else{continue;}
                                }else{
                                    $new_events[] = $event;
                                    continue;
                                }
                            }else{
                                continue;
                            }
                        }elseif(isset($data['date'])) {
                            if ($date1 > $date2 && $date1 < $date3)
                            {
                                $new_events[]= $event;
                                continue;
                            }
                        }else{
                            $new_events[]= $event;
                            continue;
                        }
                    }
                    continue;
                }elseif(isset($data['location'])){
                    if (strpos(strtolower($data['location']), strtolower($event['venue']['address']['city'])) !== false) {
                        if (isset($data['date'])) {
                            if ($date1 > $date2 && $date1 < $date3) {
                                $new_events[] = $event;
                                continue;
                            } else {
                                continue;
                            }
                        } else {
                            $new_events[] = $event;
                            continue;
                        }
                    }else{continue;}
                }elseif(isset($data['date'])){
                    if ($date1 > $date2 && $date1 < $date3)
                    {
                        $new_events[]= $event;
                        continue;
                    }
                }else{
                    $new_events[] = $event;
                }
            }

            $events = $new_events;
        }

        return $this->render('index/events.html.twig', [
            'form' => $form->createView(),
            'top' => $top,
            'events' => $events,
            'lang' => $this->lang
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
            'lang' => $this->lang
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

        $contentBottom = $this->getDoctrine()
            ->getRepository(EducationContentBottom::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(EducationFeatured::class)
            ->findAll();

        return $this->render('index/education.html.twig', [
            'top' => $top,
            'content' => $content,
            'contentBottom' => $contentBottom,
            'bottom' => $bottom,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/bridges", name="bridges")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function bridges(Request $request)
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

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
            ->add('check1', Type\CheckboxType::class, [
                'label'    => 'Teacher Kit',
                'required' => false])
            ->add('check2', Type\CheckboxType::class, [
                'label'    => 'ATP Visit to My School',
                'required' => false])
            ->add('check3', Type\CheckboxType::class, [
                'label'    => 'Bringing My School to Armenia',
                'required' => false])
            ->add('check4', Type\CheckboxType::class, [
                'label'    => 'Volunteering with Building Bridges',
                'required' => false])
            ->add('firstName', Type\TextType::class)
            ->add('lastName', Type\TextType::class)
            ->add('school', Type\TextType::class)
            ->add('title', Type\TextType::class)
            ->add('grade', Type\TextType::class)
            ->add('email', Type\EmailType::class)
            ->add('address', Type\TextType::class, ['required' => false])
            ->add('phone', Type\NumberType::class, ['required' => false])
            ->add('comments', Type\TextareaType::class, ['required' => false])
            ->add('send', Type\SubmitType::class, ['label'=>'Submit'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $interest = new Interest();
            $interest->setCheck1($data['check1']);
            $interest->setCheck2($data['check2']);
            $interest->setCheck3($data['check3']);
            $interest->setCheck4($data['check4']);
            $interest->setFirstName($data['firstName']);
            $interest->setLastName($data['lastName']);
            $interest->setSchool($data['school']);
            $interest->setTitle($data['title']);
            $interest->setGrade($data['grade']);
            $interest->setEmail($data['email']);
            $interest->setAddress($data['address']);
            $interest->setPhone($data['phone']);
            $interest->setComments($data['comments']);

            $entityManager->persist($interest);

            $entityManager->flush();

        }

        return $this->render('index/bridges.html.twig', [
            'form' => $form->createView(),
            'top' => $top,
            'content' => $content,
            'topContent' => $topContent,
            'bottom' => $bottom,
            'lang' => $this->lang
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
            'lang' => $this->lang
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
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/volunteer", name="volunteer")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function volunteer(Request $request)
    {
        $top = $this->getDoctrine()
            ->getRepository(VolunteerTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(VolunteerContent::class)
            ->findAll();

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
            ->add('check1', Type\CheckboxType::class, [
                'label'    => 'Represent ATP in your community through events and festivals',
                'required' => false])
            ->add('check2', Type\CheckboxType::class, [
                'label'    => 'Volunteer in our Woburn office for an hour or an afternoon',
                'required' => false])
            ->add('check3', Type\CheckboxType::class, [
                'label'    => 'Organize an event for ATP at your church or in your community',
                'required' => false])
            ->add('check4', Type\CheckboxType::class, [
                'label'    => 'Lend a hand at one of our many events throughout the US',
                'required' => false])
            ->add('check5', Type\CheckboxType::class, [
                'label'    => 'Bring ATP’s Building Bridges curriculum to your school or youth group',
                'required' => false])
            ->add('firstName', Type\TextType::class)
            ->add('lastName', Type\TextType::class)
            ->add('city', Type\TextType::class, ['required' => false])
            ->add('email', Type\EmailType::class)
            ->add('address', Type\TextType::class, ['required' => false])
            ->add('phone', Type\NumberType::class, ['required' => false])
            ->add('comments', Type\TextareaType::class, ['required' => false])
            ->add('send', Type\SubmitType::class, ['label'=>'Become Volunteer'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $volunteer = new Volunteer();
            $volunteer->setCheck1($data['check1']);
            $volunteer->setCheck2($data['check2']);
            $volunteer->setCheck3($data['check3']);
            $volunteer->setCheck4($data['check4']);
            $volunteer->setCheck5($data['check5']);
            $volunteer->setFirstName($data['firstName']);
            $volunteer->setLastName($data['lastName']);
            $volunteer->setCity($data['city']);
            $volunteer->setEmail($data['email']);
            $volunteer->setAddress($data['address']);
            $volunteer->setPhone($data['phone']);
            $volunteer->setComments($data['comments']);
            $volunteer->setType('volunteer');

            $entityManager->persist($volunteer);

            $entityManager->flush();

        }

        return $this->render('index/volunteer.html.twig', [
            'form' => $form->createView(),
            'top' => $top,
            'content' => $content,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/ambassador", name="ambassador")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ambassador(Request $request)
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

        $form = $this->createFormBuilder(null, array('csrf_protection' => false))
            ->add('firstName', Type\TextType::class)
            ->add('lastName', Type\TextType::class)
            ->add('city', Type\TextType::class, ['required' => false])
            ->add('email', Type\EmailType::class)
            ->add('address', Type\TextType::class, ['required' => false])
            ->add('phone', Type\NumberType::class, ['required' => false])
            ->add('message', Type\TextareaType::class, ['required' => false])
            ->add('comments', Type\TextareaType::class, ['required' => false])
            ->add('send', Type\SubmitType::class, ['label'=>'Become an Ambassador Today!'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $volunteer = new Volunteer();
            $volunteer->setFirstName($data['firstName']);
            $volunteer->setLastName($data['lastName']);
            $volunteer->setCity($data['city']);
            $volunteer->setEmail($data['email']);
            $volunteer->setAddress($data['address']);
            $volunteer->setPhone($data['phone']);
            $volunteer->setComments($data['comments']);
            $volunteer->setMessage($data['comments']);
            $volunteer->setType('ambassador');

            $entityManager->persist($volunteer);

            $entityManager->flush();

        }

        return $this->render('index/ambassador.html.twig', [
            'form' => $form->createView(),
            'top' => $top,
            'content' => $content,
            'topContent' => $topContent,
            'bottom' => $bottom,
            'lang' => $this->lang
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
            'lang' => $this->lang
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
            'lang' => $this->lang
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
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/tour", name="tour")
     */
    public function tour()
    {
        $top = $this->getDoctrine()
            ->getRepository(TourTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(TourContent::class)
            ->findOneBy([], ['id'=>'DESC']);

        $bottom = $this->getDoctrine()
            ->getRepository(TourBottom::class)
            ->findAll();

        return $this->render('index/tour.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/bndonate", name="bndonate")
     */
    public function bndonate()
    {
        return $this->render('index/bn-donate.html.twig');
    }

    /**
     * @Route("/payment", name="payment")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function payment(Request $request)
    {
        $id = $request->attributes->get('id');

        $donation = $this->getDoctrine()
            ->getRepository(Donation::class)
            ->findOneById($id);

        $form = $this->createFormBuilder()
            ->add('accountnumber', Type\TextType::class, ['required' => true])
            ->add('accountholder', Type\TextType::class, ['required' => true])
            ->add('expirymonth', Type\HiddenType::class, ['required' => true])
            ->add('expiryyear', Type\HiddenType::class, ['required' => true])
            ->add('cvv', Type\NumberType::class, ['required' => true])
            ->add('send', Type\SubmitType::class, ['label'=>'Donate now'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $matchingPatterns = [
                'visa' => '/^4[0-9]{12}(?:[0-9]{3})?$/',
                'mastercard' => '/^5[1-5][0-9]{5,}|222[1-9][0-9]{3,}|22[3-9][0-9]{4,}|2[3-6][0-9]{5,}|27[01][0-9]{4,}|2720[0-9]{3,}$/',
                'amex' => '/^3[47][0-9]{5,}$/',
                'diners' => '/^3(?:0[0-5]|[68][0-9])[0-9]{11}$/',
                'discover' => '/^6(?:011|5[0-9]{2})[0-9]{12}$/',
                'jcb' => '/^(?:2131|1800|35\d{3})\d{11}$/',
                'any' => '/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/'
            ];

            $ctr = 1;
            foreach ($matchingPatterns as $key=>$pattern) {
                if (preg_match($pattern, $data['accountnumber'])) {
                    break;
                }
                $ctr++;
            }

            if($key == 'any'){
                return $this->render('index/payment-info.html.twig', [
                    'form' => $form->createView(),
                    'lang' => $this->lang
                ]);
            }

            $entityManager = $this->getDoctrine()->getManager();

            $donation->setAccountNumber($data['accountnumber']);
            $donation->setAccountType($key);
            $donation->setAccountHolder($data['accountholder']);
            $donation->setExpiryMonth($data['expirymonth']);
            $donation->setExpiryYear($data['expiryyear']);
            $donation->setCvv($data['cvv']);

            $entityManager->persist($donation);

            $entityManager->flush();

            return $this->redirectToRoute('singlepayflow', array('id' => $donation->getId()));
        }

        return $this->render('index/payment-info.html.twig', [
            'form' => $form->createView(),
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/donateReview", name="donateReview")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function donationReview(Request $request)
    {
        $id = $request->attributes->get('id');

        $donation = $this->getDoctrine()
            ->getRepository(Donation::class)
            ->findOneById($id);

        return $this->render('index/donation-review.html.twig', [
            'donation' => $donation,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/donation-certificate", name="certeficate")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function certificate(Request $request)
    {
        $id = $request->attributes->get('id');

        $donation = $this->getDoctrine()
            ->getRepository(Donation::class)
            ->findOneById($id);

        $date = date('d. m. y');

        return $this->render('index/donation-review-certificate.html.twig', [
            'donation' => $donation,
            'date' => $date,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/stewardship", name="stewardship")
     */
    public function stewardship()
    {
        $top = $this->getDoctrine()
            ->getRepository(StewardshipTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(StewardshipContent::class)
            ->findAll();

        $slider = $this->getDoctrine()
            ->getRepository(StewardshipSlider::class)
            ->findAll();

        $allImages = $this->getDoctrine()
            ->getRepository(StewardshipSliderImages::class)
            ->findAll();

        $images = [];
        foreach($allImages as $item){
            $images[$item->getSlider()->getId()][] = $item;
        }

        $bottom = $this->getDoctrine()
            ->getRepository(StewardshipFeatured::class)
            ->findAll();

        return $this->render('index/stewardship.html.twig', [
            'top' => $top,
            'content' => $content,
            'slider' => $slider,
            'images' => $images,
            'bottom' => $bottom,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/village", name="village")
     */
    public function village()
    {
        $top = $this->getDoctrine()
            ->getRepository(VillageTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(VillageContent::class)
            ->findAll();

        $sliderTop = $this->getDoctrine()
            ->getRepository(VillageTopSlider::class)
            ->findAll();

        $sliderBottom = $this->getDoctrine()
            ->getRepository(VillageBottomSlider::class)
            ->findAll();

        $topImages = $this->getDoctrine()
            ->getRepository(VillageTopSliderImages::class)
            ->findAll();

        $bottomImages = $this->getDoctrine()
            ->getRepository(VillageBottomSliderImages::class)
            ->findAll();

        $imagesTop = [];
        foreach($topImages as $item){
            $imagesTop[$item->getSlider()->getId()][] = $item;
        }

        $imagesBottom = [];
        foreach($bottomImages as $item){
            $imagesBottom[$item->getSlider()->getId()][] = $item;
        }

        $bottom = $this->getDoctrine()
            ->getRepository(VillageFeatured::class)
            ->findAll();

        return $this->render('index/village.html.twig', [
            'top' => $top,
            'content' => $content,
            'sliderTop' => $sliderTop,
            'imagesTop' => $imagesTop,
            'sliderBottom' => $sliderBottom,
            'imagesBottom' => $imagesBottom,
            'bottom' => $bottom,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/environmental-education", name="enveducation")
     */
    public function enveducation()
    {
        $top = $this->getDoctrine()
        ->getRepository(LessonsTop::class)
        ->findOneBy([], ['id'=>'DESC']);
        $content = $this->getDoctrine()
            ->getRepository(LessonsContent::class)
            ->findAll();
        $bottom = $this->getDoctrine()
            ->getRepository(LessonsFeatured::class)
            ->findAll();
        return $this->render('index/environmental-education.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/mirak-nursery", name="mirak")
     */
    public function mirak()
    {
        $top = $this->getDoctrine()
            ->getRepository(MirakTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(MirakContent::class)
            ->findAll();

        $bottom = $this->getDoctrine()
            ->getRepository(MirakFeatured::class)
            ->findAll();

        return $this->render('index/mirak-nursery.html.twig', [
            'top' => $top,
            'content' => $content,
            'bottom' => $bottom,
            'lang' => $this->lang
        ]);
    }

    /**
     * @Route("/eco-camps", name="camps")
     */
    public function camps()
    {
        $top = $this->getDoctrine()
            ->getRepository(CampsTop::class)
            ->findOneBy([], ['id'=>'DESC']);

        $content = $this->getDoctrine()
            ->getRepository(CampsContent::class)
            ->findAll();

        return $this->render('index/eco-camp.html.twig', [
            'top' => $top,
            'content' => $content,
            'lang' => $this->lang
        ]);
    }

    /**
     * This is the default "language" action of the controller.
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function language(Request $request)
    {
        $referer = $request->headers->get('referer');

        $lang = $request->attributes->get('lang', 'eng');
        $session = $this->get('session');
        $session->set('lang', $lang);
        $this->lang = $lang;

        return $this->redirect($referer);
    }

    /**
     * @Route("/simpleDonation", name="simpleDonation")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function simpleDonation(Request $request)
    {

        $amount = $request->attributes->get('amount');

        $form = $this->createFormBuilder()
            ->add('type', Type\HiddenType::class)
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
            ->add('anonymous', Type\ChoiceType::class, array(
                'choices'  => array(
                    'Yes' => true,
                    'No' => false,
                )))
            ->add('certificate', Type\CheckboxType::class, ['required' => false])
            ->add('send', Type\SubmitType::class, ['label'=>'Next'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();

            $donation = new Donation();
            $donation->setFirstName($data['firstName']);
            $donation->setLastName($data['lastName']);
            $donation->setAmount($amount);
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
            $donation->setComments('Sample Description');
            if($amount == 1000){
                $donation->setType('TwoPayments');
            }elseif($amount == 2000){
                $donation->setType('OnePayment');
            }

            $entityManager->persist($donation);

            $entityManager->flush();

            if($data['certificate'] == true){
                return $this->redirectToRoute('certificate', array('id' => $donation->getId()));
            }elseif($data['certificate'] == false){
                return $this->redirectToRoute('donateReview', array('id' => $donation->getId()));
            }
        }

        return $this->render('index/simple_donation.html.twig', [
            'form' => $form->createView(),
            'lang' => $this->lang
        ]);
    }

    public function test()
    {
        $mail = new Sparkpost();
        $send = $mail->send();
        var_dump($send);exit;
    }
}