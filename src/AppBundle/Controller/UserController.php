<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Results;
use AppBundle\Form\ResultsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class UserController
 * @package AppBundle\Controller
 * @Security("has_role('ROLE_USER')")
 */
class UserController extends Controller
{
    /**
     * @Route("/result", name="result")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     *
     * User habits form
     */
    public function resultAction(Request $request)
    {
        // Get user id
        $userId = $this->getUser()->getId();
        // Get current user habbits
        $userCurrentHabitsId = $this->getDoctrine()->getRepository('AppBundle:UserCurrentHabits')->findOneBy(array('userId' => $userId));

        // Check if user has questions
        if(!isset($userCurrentHabitsId) || $userCurrentHabitsId != 0)
            return $this->render('user/result.html.twig', array('empty' => true));
        else
        {
            // We only need the ID
            $userCurrentHabitsId = $userCurrentHabitsId->getUserHabitId();
        // Get habits
            $habits = $this->getHabits($userCurrentHabitsId);
        }

        // Start making new record
        $result = $this->makeNewRecord($userId,$userCurrentHabitsId);
        // Start building form
        $form = $this->createForm(ResultsType::class, $result);

        // Handle request
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            // Store new record if submitted and valid
            $this->storeRecord($result);
            return $this->redirectToRoute('homepage');
        } else {
            // Make view with form and habits info
            return $this->render('user/result.html.twig', array('form' => $form->createView(), 'habits' => $habits));
        }
    }
    public function getHabits($userCurrentHabitsId){

        $userHabits = $this->getDoctrine()->getRepository('AppBundle:UserHabits')->find($userCurrentHabitsId);
        $habit_1 = $this->getDoctrine()->getRepository('AppBundle:Habits')->find($userHabits->getHabit1());
        $habit_2 = $this->getDoctrine()->getRepository('AppBundle:Habits')->find($userHabits->getHabit2());
        $habit_3 = $this->getDoctrine()->getRepository('AppBundle:Habits')->find($userHabits->getHabit3());

        // Store habbits in array
        $habits = array(
            'Habit_1' => $habit_1,
            'Habit_2' => $habit_2,
            'Habit_3' => $habit_3,
        );
        return $habits;
    }
    public function makeNewRecord($userId,$userCurrentHabitsId){
        $result = new Results();
        $result->setCreatedAt(new \DateTime());
        $result->setUserId($userId);
        $result->setUserHabitsId($userCurrentHabitsId);
        return $result;
    }
    public function storeRecord($result){
        $em = $this->getDoctrine()->getManager();
        $em->persist($result);
        $em->flush();

        // Add Flash data and redirect
        $this->addFlash('success', true);
    }
}
