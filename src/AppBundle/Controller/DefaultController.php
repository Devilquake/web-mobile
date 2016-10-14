<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Results;
use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/getid/{id}", name="getid", requirements={"id": "\d+"})
     */
    public function doneAction($id)
    {
        // get Results
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT r.userId, r.habit1, r.habit2, r.habit3 FROM AppBundle:Results r 
                  JOIN AppBundle:UserHabits uh 
                  JOIN AppBundle:Habits h1 
                  JOIN AppBundle:Habits h2
                  JOIN AppBundle:Habits h3
                  WHERE r.userId = uh.userId 
                  AND uh.habit1 = h1.id 
                  AND uh.habit2 = h2.id 
                  AND uh.habit3 = h3.id 
                  AND r.userId = :id'
        )->setParameter('id', $id);

        $results = $query->getResult();

        echo '<pre>';
        print_r($results);
        echo '</pre>';
        echo '<br><br><br><br><br><br>';
        return null;
    }
}
