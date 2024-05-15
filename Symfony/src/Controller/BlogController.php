<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog_index')]
    public function index(BlogRepository $blogRepository): Response
    {
        return $this->render('blog/index.html.twig', [
            'articles' => $blogRepository->findAll()
        ]);
    }

    #[Route('/blog/{slug}/{id}', name: 'app_blog_show')]
    public function show(Blog $blog): Response
    {
        return $this->render('blog/show.html.twig', [
            'article' => $blog
        ]);
    }
}
