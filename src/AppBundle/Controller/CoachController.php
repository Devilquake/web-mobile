<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Habits;
use AppBundle\Entity\UserCurrentHabits;
use AppBundle\Entity\UserHabits;
use AppBundle\Form\HabitsType;
use AppBundle\Form\UserCurrentHabitsType;
use AppBundle\Form\UserHabitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CoachController
 * @package AppBundle\Controller
 * @Security("has_role('ROLE_COACH')")
 */
class CoachController extends Controller
{
    /**
     * @Route("/habits/new", name="new_habit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * New habit
     */
    public function new_habit(Request $request)
    {
        $result = new Habits();
        $form = $this->createForm(HabitsType::class, $result);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->storeRecord($result);
        } else {
            return $this->render('coach/new_habit.html.twig', array('form' => $form->createView()));
        }
    }

    /**
     * @Route("/habits/new/user_habit", name="user_habit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function user_habit(Request $request)
    {
        $userHabits = new UserHabits();
        $form = $this->createForm(UserHabitsType::class, $userHabits);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->storeRecord($userHabits);
        } else {
            return $this->render('coach/new_user_habit.html.twig', array('form' => $form->createView()));
        }
    }

    /**
     * @Route("/test", name="current_habit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function current_habit(Request $request)
    {
        $currentHabit = new UserCurrentHabits();
        $form = $this->createForm(UserCurrentHabitsType::class, $currentHabit);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $record = $em->getRepository('AppBundle:UserCurrentHabits')->findBy(array('userId' => '1'));

            $record[0]->setUserHabitId($currentHabit->getUserHabitId());
            $em->flush();
            /*
            if (!isset($record[0])) {
                $em->persist($currentHabit);
                $em->flush();
            } else {
                $record[0]->setUserHabitId($currentHabit->getUserHabitId());
                $em->flush();
            }*/


            $this->addFlash('success', true);
            return $this->redirectToRoute('homepage');
        } else {
            return $this->render('coach/new_current_habit.html.twig', array('form' => $form->createView()));
        }
    }

    /**
     * @Route("/test", name="current_habit")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function test(Request $request)
    {
        $currentHabit = new UserCurrentHabits();
        $form = $this->createForm(UserCurrentHabitsType::class, $currentHabit);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
           $this->storeRecord($currentHabit);
        } else {
            return $this->render('coach/new_current_habit.html.twig', array('form' => $form->createView()));
        }
    }

    public function storeRecord($record){
        $em = $this->getDoctrine()->getManager();
        $em->persist($record);
        $em->flush();


        $this->addFlash('success', true);
        return $this->redirectToRoute('homepage');

    }
}
