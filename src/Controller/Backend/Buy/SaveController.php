<?php
namespace App\Controller\Backend\Buy;

use App\Entity\Booking;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Service\BookingService;
use App\Helpers\ResponseGenerator;
use Symfony\Component\HttpFoundation\Response;

class SaveController
{
    protected function isValidField(string $field) : bool
    {
        return ((!isset($field)) || (empty($field))) ? false : true;
    }

    /**
     * Returns a JSON Response and try to save a product
     * @param Request $request
     * @param BookingService $productService
     * 
     * @return JsonResponse
     *
     */
    public function index(Request $request, BookingService $bookingService) : JsonResponse
    {
        try {

            $paramsPost = $request->getContent();
            $paramsPost = json_decode($paramsPost, true);

            if (!is_array($paramsPost)) {
                return ResponseGenerator::makeResponse(false,Response::HTTP_BAD_REQUEST, "No hay parametros en peticion");
            }

            if (!$this->isValidField($paramsPost['price_total'])){
                return ResponseGenerator::makeResponse(false,Response::HTTP_BAD_REQUEST, "Precio es requerido en peticion");
            }

            if (!$this->isValidField($paramsPost['id_activity'])){
                return ResponseGenerator::makeResponse(false,Response::HTTP_BAD_REQUEST, "Id Actividad es requerido en peticion");
            }

            if (!$this->isValidField($paramsPost['date_activity'])){
                return ResponseGenerator::makeResponse(false,Response::HTTP_BAD_REQUEST, "Fecha de actividad es requerida en peticion");
            }

            if (!$this->isValidField($paramsPost['people'])){
                return ResponseGenerator::makeResponse(false,Response::HTTP_BAD_REQUEST, "Numero de personas es requerida en peticion");
            }

            $people = (int) $paramsPost['people'];
            $price = (float) $paramsPost['price_total'];
            $actId = (int) $paramsPost['id_activity'];

            $booking = new Booking();
            $booking->setIdActivity($actId);
            $booking->setTotalPrice($price);
            $booking->setPeople($people);

            $dateActivity = new \DateTime();
            $dateActivityTime= strtotime($paramsPost['date_activity']);
            $dateActivity->setTimestamp($dateActivityTime);

            $currentTime = time();
            $currentDate = new \DateTime();
            $currentDate->setTimestamp($currentTime);
            $booking->setActivityDate($dateActivity);
            $booking->setCreatedAt($currentDate);

            $response = $bookingService->save($booking);
            $code = ($response) ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST;
            $message = ($response) ? "Item saved properly" : "Item could not be saved";

            return ResponseGenerator::makeResponse($response, $code, $message);

        } catch(\Exception $e) {

            return ResponseGenerator::makeResponse(false, $e->getCode(), $e->getMessage());
        }
    }
}
