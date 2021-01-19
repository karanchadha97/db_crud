<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Employee;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/employee", name="employee")
     */
    public function addEmployee(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $emp = new Employee();
        $emp->setName('Arjun');
        $emp->setAge(24);
        $emp->setSalary(30000);
        $emp->setDepartment('Research');
        $entityManager->persist($emp);
        $entityManager->flush();
        return new Response('Saved new employee with id '.$emp->getId());
    }
    /**
     * @Route("/employee/{id}", name="employee_show")
     */
    public function show(int $id): Response
    {
        $emp = $this->getDoctrine()
            ->getRepository(Employee::class)
            ->find($id);

        if (!$emp) {
            throw $this->createNotFoundException(
                'No employee found for id '.$id
            );
        }

        return new Response('Employee: '.$emp->getName());
    }
    /**
     * @Route("/employee/edit/{id}")
     */
    public function update(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $emp = $entityManager->getRepository(Employee::class)->find($id);

        if (!$emp) {
            throw $this->createNotFoundException(
                'No employee found for id '.$id
            );
        }

        $emp->setName('Karan');
        $entityManager->persist($emp);
        $entityManager->flush();

        return $this->redirectToRoute('employee_show', [
            'id' => $emp->getId()
        ]);
    }
    /**
     * @Route("/employee/delete/{id}")
     */
    public function delete(int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $emp = $entityManager->getRepository(Employee::class)->find($id);

        if (!$emp) {
            throw $this->createNotFoundException(
                'No employee found for id '.$id
            );
        }

        $entityManager->remove($emp);
        $entityManager->flush();

      return new Response('Object Deleted');
    }
}
