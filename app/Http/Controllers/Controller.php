<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Generate success Response
     * @param  array $data [description]
     * @return \Illuminate\Http\JsonResponse
     */
    protected function generateSuccess($data = [], $mergeArray = true)
    {
        $arr = [
            'status' => 'Success',
            'description' => 'OK'
        ];

        if ($mergeArray) {
            return response()->json(array_merge($arr, ['data' => $data]),200);
        }
        
        return response()->json($arr,200);
        
    }

    /**
     * Generate Created Response
     * @return \Illuminate\Http\JsonResponse
     */
    protected function generateCreatedResponse($data = [], $mergeArray = true)
    {
        $arr = [
            'status' => 'Success',
            'description' => 'Created'
        ];

        if ($mergeArray) {
            return response()->json(array_merge($arr, ['data' => $data]),201);
        }
        
        return response()->json($arr, 201);
    }   

    /**
     * Generate bad request Response
     * @param  array $data [description]
     * @return \Illuminate\Http\JsonResponse
     */
    protected function generateBadRequest($cusomMessage = null)
    {
        return response()->json([
            'status' => 'Error',
            'description' => !is_null($cusomMessage) ? $cusomMessage : 'Bad Request'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Generate not found response
     * @return [type] [description]
     */
    protected function generateNoFoundResponse($cusomMessage = null)
    {
        return response()->json([                
            'status' => 'Error',
            'description' => !is_null($cusomMessage) ? $cusomMessage : 'Not Found'
        ],404);
    }


}
