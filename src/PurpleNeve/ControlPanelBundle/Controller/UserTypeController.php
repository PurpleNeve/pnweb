<?php

namespace PurpleNeve\ControlPanelBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PurpleNeve\ControlPanelBundle\Entity\UserType;
use PurpleNeve\ControlPanelBundle\Form\UserTypeType;

/**
 * UserType controller.
 *
 */
class UserTypeController extends Controller
{

    /**
     * Lists all UserType entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ControlPanelBundle:UserType')->findAll();

        return $this->render('ControlPanelBundle:UserType:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new UserType entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UserType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usertype_show', array('id' => $entity->getId())));
        }

        return $this->render('ControlPanelBundle:UserType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a UserType entity.
    *
    * @param UserType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(UserType $entity)
    {
        $form = $this->createForm(new UserTypeType(), $entity, array(
            'action' => $this->generateUrl('usertype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UserType entity.
     *
     */
    public function newAction()
    {
        $entity = new UserType();
        $form   = $this->createCreateForm($entity);

        return $this->render('ControlPanelBundle:UserType:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserType entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlPanelBundle:UserType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlPanelBundle:UserType:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing UserType entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlPanelBundle:UserType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserType entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ControlPanelBundle:UserType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UserType entity.
    *
    * @param UserType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UserType $entity)
    {
        $form = $this->createForm(new UserTypeType(), $entity, array(
            'action' => $this->generateUrl('usertype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UserType entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ControlPanelBundle:UserType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usertype_edit', array('id' => $id)));
        }

        return $this->render('ControlPanelBundle:UserType:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UserType entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ControlPanelBundle:UserType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usertype'));
    }

    /**
     * Creates a form to delete a UserType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usertype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
