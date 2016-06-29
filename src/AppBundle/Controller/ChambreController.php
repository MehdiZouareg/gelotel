<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Chambre;
use Perischool\CoreBundle\Repository\ChambreRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ChambreController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @route("/reservation/getCh", name="chambre_get", options={"expose"=true})
     */
    public function getChambrebyHotelAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $recherche = $request->request->get('hotel');

        $listeChambres = $em->getRepository('AppBundle:Chambre')->listeDisponiblesByHotel($recherche);

        return new Response(json_encode($listeChambres), 200);


    }
}