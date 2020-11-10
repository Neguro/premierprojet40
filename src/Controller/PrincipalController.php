<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Employe;

class PrincipalController extends AbstractController
{
    /**
     * @Route("/principal", name="principal")
     */
    public function index(): Response
    {
        return $this->render('principal/index.html.twig', [
            'controller_name' => "Symfony, c'est super"
        ]);
    }
    
     /**
     * @Route("/welcome/{nom}")
     */
    
     public function welcome(string $nom): Response 
     {
         return $this->render('principal/welcome.html.twig', [
             "nom" => $nom
         ]);
     }
     
     /**
     * @Route("/info/{cd}&{genre}")
     */
     public function info(string $cd, string $genre) : Response
     {
         return $this->render('principal/info.html.twig', [
             "cd" => $cd, "genre" => $genre 
         ]);
     }
     
     /**
     * @Route("/employes", name="employes")
      * @param RegisteryInterface $doctrine 
     */
     public function afficheEmployes(ManagerRegistry $doctrine)
     {
         $employes = $doctrine->getRepository(Employe::class)->findAll();
         $titre = "Liste des employes";
         return $this->render('principal/employes.html.twig',compact('titre','employes'));
     }
     
     /**
     * @Route("/employe/{id}", name="unemploye", requirements={"id":"\d+"})
     * @param RegisteryInterface $doctrine 
     */
     public function afficheUnEmploye(ManagerRegistry $doctrine, int $id)
     {
         $employe = $doctrine->getRepository(Employe::class)->find($id);
         $titre = "Employe n°" . $id;
         return $this->render('principal/unemploye.html.twig',compact('titre','employe'));
     }
     
     /**
     * @Route("/employetout/{id}", name="employetout", requirements={"id":"\d+"})
     * @param RegisteryInterface $doctrine 
     */
     public function afficheUnEmployeTout(ManagerRegistry $doctrine, int $id)
     {
         $employe = $doctrine->getRepository(Employe::class)->find($id);
         $titre = "Employe n°" . $id;
         return $this->render('principal/unemployetout.html.twig',compact('titre','employe'));
     }
}
