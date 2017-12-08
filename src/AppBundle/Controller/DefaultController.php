<?php

namespace AppBundle\Controller;

use AppBundle\Document\Ticket;
use AppBundle\Document\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function indexAction(Request $request)
    {
        return $this->render(':default:index.html.twig');
    }

    /**
     * @Route("/search", name="search")
     */

    public function showSearchAction(Request $request)
    {
        return $this->render(':default:search-window.html.twig');
    }


    /**
     * @Route("/user", name="user_create")
     */

    public function userAction(Request $request)
    {
        $user = new User();
        $user->setPassword('abdou macy');
        $user->setEmail("macyjohn@test.com");
        $user->setEnabled(true);

        $ticket = new Ticket();
        $ticket->setShop('anvers');
        $ticket->setPrintTime('1-10-2017');
        $ticket->setCreatedAt('04-02-2017');
        $ticket->setUpdatedAt('22-11-2017');
        $ticket->setUser($user);

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($user);
        $dm->persist($ticket);

        $dm->flush();
        //console.log($user->getId());
        return new Response(
            'Saved new ticket with id: '.$ticket->getMd5sum()
            .' and new user with id: '.$user->getPublicId()
        );
    }


    /**
     * @Route("/ticket", name="ticket_create")
     */

    public function ticketAction(Request $request)
    {
        $ticket = new Ticket();
        $ticket->setShop('lorient');
        $ticket->setUserId("5a2a95c155aae815b76aaa40");
        $ticket->setPrintTime('21-11-2017');
        $ticket->setCreatedAt('21-11-2017');
        $ticket->setCreatedAt('21-11-2017');
        $ticket->setUser();



        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($ticket);
        $dm->flush();
        //console.log($user->getId());
        return new Response('Created ticket id'.$ticket->getMd5sum());
    }

    public function searchAction(){
        $form = $this->createFormBuilder(null)
                ->add('userId', TextType::class, array('label' => false, 'required' => true, 'attr' => array(
                    'placeholder' => 'Référence client'
                )))
                ->add('refFact', TextType::class,  array( 'label' => false,'required' => true, 'attr' => array(
                    'placeholder' => 'Numéro facture'
                )))

                ->add('save', SubmitType::class, array('label' => 'Valider'))
                ->getForm();

        return $this->render(':default:Search.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("searchMe", name="handleSearch")
     * @param Request $request
     */
    public function handleSearch(Request $request){
        $session = new Session();
        $data = $request->request->get('form');

        //var_dump($data); die;
        $userId= $data["userId"];
        $refFact = $data["refFact"];
        $session->set('userid', $userId);
        $session->get('ref_fact',$refFact);
        $id_user= $session->get('userid');
        $ref_fact= $session->get('ref_fact');

        if ($request->getMethod() == 'POST') {
            $ticket = $this->get('doctrine_mongodb')
                ->getRepository('AppBundle:Ticket')
                ->findOneBy(array('U' =>$id_user, 'id' => $ref_fact));
                //->searchTicket($id_user,$ref_fact);


            if (!$ticket) {
                throw $this->createNotFoundException('Pas de facture trouvée avec ces indentifiants..');
            }
                    }

        return $this->render(':default:result.html.twig', array(
            'TicketOne' => $ticket

        ));



    }
}
