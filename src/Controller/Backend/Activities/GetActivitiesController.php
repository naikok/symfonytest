<?php
namespace App\Controller\Backend\Activities;

use App\Service\ActivityService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Service\Transformer\TransformerService;
use App\Helpers\ResponseGenerator;

class GetActivitiesController
{
    /**
     * Returns a JSON Response including the activity list 
     * @param Request request
     * @param ActivityService $activityService
     * @param TransformerService $transformer
     * @return JsonResponse
     *
     */
    public function index(Request $request, ActivityService $activityService, TransformerService $transformer) : JsonResponse
    {

        $people = $request->get('people');
        $date = $request->get( 'date');

        try {
            $fecha = new \DateTime();
            $time = strtotime($date);
            $fecha->setTimestamp($time);

            $result =  $activityService->getAvailableActivities($fecha, $people);
            $activities = $transformer->transform($result);
            $success = true;

            return ResponseGenerator::makeResponse($success, Response::HTTP_OK, $activities);

        } catch(\Exception $e) {
            $success = false;
            return ResponseGenerator::makeResponse($success, $e->getCode(), $e->getMessage());
        }
    }

}
