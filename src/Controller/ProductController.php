<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;


class ProductController extends AbstractController
{
    #[Route('/product', name: 'product')]
 
    public function home(ManagerRegistry $doctirine)
    {
        $entityManager = $doctirine->getManager();
        //récupérer tous les articles de la table article de la BD
        // et les mettre dans le tableau $articles
        $produts = $doctirine->getRepository(Product::class)->findAll();
        return $this->render('products/index.html.twig', ['products' => $produts]);
    }

    #[Route('/product/{id}', name: 'product_show')]

public function show($id,ManagerRegistry $doctirine) {
    $entityManager = $doctirine->getManager();
    $product = $doctirine->getRepository(Product::class)->find($id);
    return $this->render('products/show.html.twig',
    array('product' => $product));
     }
    
}
