<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/blog", name="blog")
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="blog_index")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     *
     * @Route("/show/{slug}", defaults={"slug"="Article Sans Titre"}, requirements={"slug"="^[a-z0-9-]+$"}, name="blog_show")
     */
    public function show(string $slug)
    {
//        if(!$slug){
//            $slug = "Article Sans Titre";
//        }

        $slug = ucwords(str_replace('-', ' ', $slug));

        return $this->render('blog/show.html.twig', [
            'slug' => $slug,
        ]);
    }
}
