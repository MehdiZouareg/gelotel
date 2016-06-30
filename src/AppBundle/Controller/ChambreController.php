<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Chambre;
use AppBundle\Form\ChambreType;
use AppBundle\Repository\ChambreRepository;
use AppBundle\Repository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use JMS\SerializerBundle\JMSSerializerBundle;


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
        $hotel = $request->request->get('hotel');
        $dateDep = $request->request->get('dateDep');
        $dateArr = $request->request->get('dateArr');

        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = $container->get('jms_serializer');
       

        $listeChambres = $em->getRepository('AppBundle:Chambre')->listeDisponiblesByHotel($hotel, $dateDep, $dateArr);


        return new Response($serializer->serialize($listeChambres,'json'), 200);

    }

}