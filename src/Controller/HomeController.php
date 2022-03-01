<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route( '/', name: 'app_home', methods: 'GET' )]
    public function index(EntityManagerInterface $entityManager) : Response
    {
        $repo  = $entityManager->getRepository(Post::class);
        $posts = $repo->findAll();
        return $this->render('home/index.html.twig', [
            'posts' => $posts, ]);
    }
}
