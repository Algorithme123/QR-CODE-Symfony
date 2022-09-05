<?php

namespace App\Controller;

use App\Entity\Qrcode;
use App\Form\QrcodeType;
use App\Repository\QrcodeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\QrcodeServices;

// #[Route('/qrcode')]
class QrcodeController extends AbstractController
{



    /* 

    #[Route('/ccc', name: 'app_qrcode_index', methods: ['GET'])]
    public function index(QrcodeRepository $qrcodeRepository): Response
    {
        return $this->render('qrcode/index.html.twig', [
            'qrcodes' => $qrcodeRepository->findAll(),
        ]);
    }

    #[Route('/', name: 'app_qrcode_new', methods: ['GET', 'POST'])]
    public function new(Request $request, QrcodeRepository $qrcodeRepository): Response
    {
        $qrcode = new Qrcode();
        $form = $this->createForm(QrcodeType::class, $qrcode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qrcodeRepository->add($qrcode, true);

            return $this->redirectToRoute('app_qrcode_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qrcode/new.html.twig', [
            'qrcode' => $qrcode,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_qrcode_show', methods: ['GET'])]
    public function show(Qrcode $qrcode): Response
    {
        return $this->render('qrcode/show.html.twig', [
            'qrcode' => $qrcode,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_qrcode_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Qrcode $qrcode, QrcodeRepository $qrcodeRepository): Response
    {
        $form = $this->createForm(QrcodeType::class, $qrcode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $qrcodeRepository->add($qrcode, true);

            return $this->redirectToRoute('app_qrcode_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qrcode/edit.html.twig', [
            'qrcode' => $qrcode,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_qrcode_delete', methods: ['POST'])]
    public function delete(Request $request, Qrcode $qrcode, QrcodeRepository $qrcodeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$qrcode->getId(), $request->request->get('_token'))) {
            $qrcodeRepository->remove($qrcode, true);
        }

        return $this->redirectToRoute('app_qrcode_index', [], Response::HTTP_SEE_OTHER);
    }
    */


    #[Route('/', name: 'wer')]


    public function qrcode(Request $request, QrcodeServices $qrcodeServices){
        $qrCode = null;
        $form = $this->createForm(QrcodeType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            // dd($data);
            $qrCode = $qrcodeServices->qrcode($data->getNom());
        }

        return $this->render('qrcode/new.html.twig', [
            'form' => $form->createView(),
            'qrCode' => $qrCode
        ]);

    }
}
