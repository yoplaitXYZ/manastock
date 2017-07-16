<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
     public function indexAction(Request $request)
     {
         $em = $this->getDoctrine()->getManager();
         $produits = $em->getRepository('AppBundle:Produit')->findAll();
         return $this->render('default/index.html.twig', [
             'produits' => $produits
         ]);

     }
     /**
   * @Route("/produit/add", name="produit_add")
   */
  public function addProduitAction(Request $request)
  {
    }
        /**
      * @Route("/produit/edit/{id}", name="produit_edit")
      */
      public function editproduitAction(Request $request,$id)
      {

      }
      /**
      * @Route("/produit/supp/{id}", name="produit_supp")
      */
      public function supproduitAction(Request $request,$id)
      {

              $em = $this->getDoctrine()->getManager();
              $produits = $em->getRepository('AppBundle:Produit')->find($id);

              if (null === $produits) {
                  echo "produit n'a pas etait trouvé";
                  die;
              }

              $em->remove($produits);
              $em->flush();
              return $this->redirectToRoute('homepage');
      }
}
