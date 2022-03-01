<?php

namespace App\Controller;

use App\Service\JsonRPC\Activity;
use App\Service\JsonRPC\JsonRPC;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route( '/admin/activity', name: 'app_admin' )]
    public function index(Request $request, JsonRPC $jsonRPC) : Response
    {
        $page = $request->get('page') ?? 0;
        //        $result = $jsonRPC->query(Activity::QUERY_VISIT_LIST, [ 'page' => $page ]);
        $result = $jsonRPC->query(Activity::QUERY_VISIT_LIST, [
            'page' => $page,
            'rpp'  => 1 ]);
        return $this->render('admin/index.html.twig', [
            'records'      => $result['records'],
            'current_page' => $page,
            'page_count'   => $result['pages'] ]);
    }
}
