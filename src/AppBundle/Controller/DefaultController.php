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
        $result = new Results();
        $form = $this->createFormBuilder($result)
            ->add('habit1', TextType::class)
            ->add('habit2', TextType::class)
            ->add('habit3', TextType::class)
            ->add('calories', TextType::class)
            ->add('weight', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Verzenden'))
            ->getForm();


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($result);
            $em->flush();
            return $this->redirectToRoute('done');
        } else {
            return $this->render(':default:index.html.twig', array('form' => $form->createView()));
        }
    }

    /**
     * @Route("/done", name="done")
     */
    public function doneAction(Request $request)
    {
        echo 'form submitted';
        return null;
    }
}
