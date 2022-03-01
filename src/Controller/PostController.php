<?php

namespace App\Controller;

use App\Entity\Post;
use App\Service\JsonRPC\Activity;
use App\Service\JsonRPC\JsonRPC;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PostController extends AbstractController
{
    #[Route( '/post/{post_slug}', name: 'post' )]
    public function index($post_slug, EntityManagerInterface $entityManager, JsonRpc $jsonRPC) : Response
    {
        $repo = $entityManager->getRepository(Post::class);
        $post = $repo->findOneBy([ 'uri' => $post_slug ]);
        if ($post) {
            try {
                $jsonRPC->command(Activity::COMMAND_VISIT_STORE, [
                    'url'  => $this->generateUrl('post', [
                        'post_slug' => $post_slug ], UrlGeneratorInterface::ABSOLUTE_URL),
                    'date' => date('Y-m-d H:i:s') ]);
            }
            catch ( \Exception $e ) {
                echo $e->getMessage();
                die();
            }
            return $this->render('post/index.html.twig', [
                'post' => $post ]);
        }
        return new Response('', 404);
    }
}
