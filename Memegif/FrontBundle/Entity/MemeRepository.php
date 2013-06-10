<?php

namespace Memegif\FrontBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MemeRepository extends EntityRepository
{

    public function createOne($img, $msg, $name)
    {
        $meme = new Meme();
        $meme->setImgUrl($img)
            ->setMessage($msg)
            ->setName($name)
            ->setLang('fr')
            ->setInsertDate(new \DateTime(date('Y-m-d H:i:s')))
            ->buildSignature();

        $em = $this->getEntityManager();
        $em->persist($meme);
        $em->flush();

        $meme->buildPermalink();
        return $meme;
    }

    public function getRecents($page)
    {
        $em = $this->getEntityManager();

        $query = $em->createQuery("
            select m
            from MemegifFrontBundle:Meme m
	        where m.lang = 'fr'
            order by m.insertDate desc
        ")->setMaxResults(5);

        return $query->getResult();
    }

}
