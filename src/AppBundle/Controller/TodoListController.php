<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Task;

class TodoListController extends Controller
{
  /**
   * @Route("/todolist/task")
   * @Method({"GET"})
   */
  function getTasksAction()
  {
    $repository = $this->getDoctrine()->getRepository('AppBundle:Task');
    $tasks = $repository->getTasks();
    return new JsonResponse($tasks);
  }

  /**
   * @Route("/todolist/task")
   * @Method({"POST"})
   */
   function addTaskAction(Request $request)
   {
     $body = json_decode($request->getContent(), true);
     $em = $this->getDoctrine()->getManager();
     $em->getConnection()->beginTransaction();
     $response = new Response();
     try{
       $task = new Task();
       $task->setName($body['name']);
       $task->setDateCreated($body['dateCreated']);
       $task->setStatus($body['status']);
       $em->persist($task);
       $em->flush();
       $em->getConnection()->commit();
       $response->setStatusCode(200);
       $response->headers->set('Location', $task->getId());
     }catch (Exception $e) {
       $em->getConnection()->rollBack();
       $response->setStatusCode(500);
     }
     return $response;
   }

   /**
    * @Route("/todolist/task/{id}")
    * @Method({"PUT"})
    */
    function updateTaskAction(Request $request, $id)
    {
      $body = json_decode($request->getContent(), true);
      $response = new Response();
      $doctrine = $this->getDoctrine();
      $em = $doctrine->getManager();
      $em->getConnection()->beginTransaction();
      try {
        $task = $doctrine->getRepository('AppBundle:Task')
                        ->find($id);
        if(array_key_exists('name', $body)){
          $task->setName($body['name']);
        }
        if(array_key_exists('status', $body)){
          $task->setStatus($body['status']);
        }
        $em->persist($task);
        $em->flush();
        $em->getConnection()->commit();
        $response->setStatusCode(200);

      } catch (Exception $e) {
        $em->getConnection()->rollBack();
        $response->setStatusCode(500);
      }
      return $response;
    }

    /**
    * @Route("/todolist/task/{id}")
    * @Method({"DELETE"})
    */
    function deleteTask(Request $request, $id)
    {
      $response = new Response();
      $em = $this->getDoctrine()->getManager();
      $em->getConnection()->beginTransaction();
      try{
        $task = $em->getReference('AppBundle:Task', $id);
        $em->remove($task);
        $em->flush();
        $em->getConnection()->commit();
        $response->setStatusCode(200);
      }catch (Exception $e) {
        $em->getConnection()->rollBack();
        $response->setStatusCode(500);
      }
      return $response;
    }
}
