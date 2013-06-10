<?php

namespace Memegif\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Memegif\FrontBundle\Entity\Meme;
use Memegif\FrontBundle\Form\MemeType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $form = $this->get('form.factory')->create(new MemeType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $form->getData();
            /* @var $data Meme */

            $em = $this->getDoctrine()->getManager();
            $repository = $em->getRepository('MemegifFrontBundle:Meme');
            $meme = $repository->createOne($data->getImgUrl(), $data->getMessage(), $data->getName());

            //*
            return $this->redirect($this->generateUrl(
                'index_view',
                array('shortId' => $meme->getPermalink())
            ));
            /**/
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route("/recent/{page}", name="index_recent", defaults={"page"=1})
     * @Route("/r/{page}", name="index_recent_s", defaults={"page"=1})
     * @Template()
     */
    public function recentAction($page)
    {
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MemegifFrontBundle:Meme');
        $memes = $repository->getRecents($page);

        return array('memes' => $memes);
    }

    /**
     * @Route("/v/{shortId}", name="index_view")
     * @Template()
     */
    public function viewAction($shortId)
    {
        $id = Meme::permalinkToId($shortId);

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('MemegifFrontBundle:Meme');
        $meme = $repository->find($id);

        return array('meme' => $meme);
    }
}
