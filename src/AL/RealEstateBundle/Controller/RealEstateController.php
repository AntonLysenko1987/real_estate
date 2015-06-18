<?php

namespace AL\RealEstateBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use AL\RealEstateBundle\Entity\RealEstate;
use AL\RealEstateBundle\Form\RealEstateType;
use AL\RealEstateBundle\Form\SignUpType;

/**
 * RealEstate controller.
 *
 */
class RealEstateController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ALRealEstateBundle:RealEstate')->getActiveRealEstates(30);

        return $this->render('ALRealEstateBundle:RealEstate:index.html.twig', array(
            'entities' => $entities
        ));
    }
    /**
     * Lists all RealEstate entities.
     *
     */
    public function realEstateEntitiesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ALRealEstateBundle:RealEstate')->getActiveRealEstates(10);

        return $this->render('ALRealEstateBundle:RealEstate:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new RealEstate entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new RealEstate();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('al_real_estate_show', array('id' => $entity->getId())));
        }

        return $this->render('ALRealEstateBundle:RealEstate:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a RealEstate entity.
     *
     * @param RealEstate $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(RealEstate $entity)
    {
        $form = $this->createForm(new RealEstateType(), $entity, array(
            'action' => $this->generateUrl('al_real_estate_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new RealEstate entity.
     *
     */
    public function newAction()
    {
        $entity = new RealEstate();
        $form   = $this->createCreateForm($entity);

        return $this->render('ALRealEstateBundle:RealEstate:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a RealEstate entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ALRealEstateBundle:RealEstate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RealEstate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ALRealEstateBundle:RealEstate:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing RealEstate entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ALRealEstateBundle:RealEstate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RealEstate entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ALRealEstateBundle:RealEstate:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a RealEstate entity.
    *
    * @param RealEstate $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(RealEstate $entity)
    {
        $form = $this->createForm(new RealEstateType(), $entity, array(
            'action' => $this->generateUrl('al_real_estate_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing RealEstate entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ALRealEstateBundle:RealEstate')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find RealEstate entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('al_real_estate_edit', array('id' => $id)));
        }

        return $this->render('ALRealEstateBundle:RealEstate:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a RealEstate entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ALRealEstateBundle:RealEstate')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find RealEstate entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('al_real_estate'));
    }
    private function createSignUpForm()
    {
        $form = $this->createForm(new SignUpType(), array(
            'action' => $this->generateUrl('al_real_estate_sign_up_confirm'),
            'method' => 'POST',
        ));

        return $form;
    }
    public function signInAction()
    {

        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('ALRealEstateBundle:Default:sign-in.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }

    public function signUpAction()
    {
        $signUpForm = $this->createSignUpForm();

        $signUpForm->add('submit', 'submit', array('label' => 'Sign Up'));

        return $this->render('ALRealEstateBundle:Default:sign-up.html.twig', array(
            'signUp' =>  $signUpForm->createView()
        ));
    }

    /**
     * Creates a form to delete a RealEstate entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('al_real_estate_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
