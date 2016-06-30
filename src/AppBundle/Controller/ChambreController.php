<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;




class ChambreController extends Controller
{
    public function getChambrebyHotelAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $recherche = $request->request->get('hotel');

        $listeChambres = $em->getRepository('AppBundle:Chambre')->listeDisponiblesByHotel($recherche);

        return new Response(json_encode($listeChambres), 200);
    }
}