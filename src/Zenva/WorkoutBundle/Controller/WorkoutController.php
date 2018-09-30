<?php

namespace Zenva\WorkoutBundle\Controller;

use Zenva\WorkoutBundle\Entity\Workout;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Workout controller.
 *
 * @Route("workout")
 */
class WorkoutController extends Controller
{
    /**
     * Lists all workout entities.
     *
     * @Route("/", name="workout_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $workouts = $em->getRepository('ZenvaWorkoutBundle:Workout')->findAll();

        return $this->render('workout/index.html.twig', array(
            'workouts' => $workouts,
        ));
    }

    /**
     * Creates a new workout entity.
     *
     * @Route("/new", name="workout_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $workout = new Workout();
        $form = $this->createForm('Zenva\WorkoutBundle\Form\WorkoutType', $workout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($workout);
            $em->flush();

            return $this->redirectToRoute('workout_show', array('id' => $workout->getId()));
        }

        return $this->render('workout/new.html.twig', array(
            'workout' => $workout,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a workout entity.
     *
     * @Route("/{id}", name="workout_show")
     * @Method("GET")
     */
    public function showAction(Workout $workout)
    {
        $deleteForm = $this->createDeleteForm($workout);

        return $this->render('workout/show.html.twig', array(
            'workout' => $workout,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing workout entity.
     *
     * @Route("/{id}/edit", name="workout_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Workout $workout)
    {
        $deleteForm = $this->createDeleteForm($workout);
        $editForm = $this->createForm('Zenva\WorkoutBundle\Form\WorkoutType', $workout);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('workout_edit', array('id' => $workout->getId()));
        }

        return $this->render('workout/edit.html.twig', array(
            'workout' => $workout,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a workout entity.
     *
     * @Route("/{id}", name="workout_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Workout $workout)
    {
        $form = $this->createDeleteForm($workout);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($workout);
            $em->flush();
        }

        return $this->redirectToRoute('workout_index');
    }

    /**
     * Creates a form to delete a workout entity.
     *
     * @param Workout $workout The workout entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Workout $workout)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('workout_delete', array('id' => $workout->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
