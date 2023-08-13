<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Header;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DataController extends Controller
{
    /**
     * 
     * Get all datas
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(Data::all());
    }

    /**
     * 
     * Return N latest datas
     * 
     * @param Integer $N
     * @return JsonResponse
     */
    public function indexLatestN($N)
    {
        $datas = Data::latest()->take($N)->get();
        return response()->json($datas);
    }

    /**
     * Add data
     * 
     * @param Request $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function add(Request $request)
    {
        // Validate the incoming JSON structure
        $validator = Validator::make($request->post(), [
            'time' => 'required|date_format:d/m/Y H.i.s',
            'device' => 'required|integer|exists:devices,id',
            'data' => 'required|array',
            'data.*' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            // Store header in headers table
            $header = new Header();
            $header->row_timestamp = $request->get('time');
            $header->device_id = $request->get('device');
            $header->saveOrFail();
            $headerId = Header::max('id');

            // Validate and process the variable IDs and data values
            $dataItems = $request->input('data');
            foreach ($dataItems as $variableId => $dataValue) {
                // Validate variable_id existence
                $validator = Validator::make(['variable_id' => $variableId], [
                    'variable_id' => 'required|exists:variables,id',
                ]);

                if ($validator->fails()) {
                    // Handle validation failure, such as returning an error response
                    return response()->json(['error' => 'Invalid variable_id'], 400);
                }

                // Store data in datas table
                Data::create([
                    'data_value' => $dataValue,
                    'variable_id' => $variableId,
                    'header_id' => $headerId,
                ]);
            }
            return response()->json(['message' => 'Data stored successfully'], 201);

        } catch (Exception $e) {
            Log::debug('error creating header or data');
        }
    }
    
    /**
     * Remove older than K samples
     * 
     * @param Request $request
     * @param Integer $k
     * @return JsonResponse
     */
    public function removeOlderThanK(Request $request, $k)
    {
        // Validate the input K value
        $request->validate([
            'k' => 'required|integer|min:1',
        ]);

        // Retrieve the K most recent tasks' IDs
        $recentDataIds = Data::latest()->take($k)->pluck('id');

        // Delete tasks older than the K most recent tasks
        Data::whereNotIn('id', $recentDataIds)->delete();

        return response()->json(['message' => 'Datas older than K most recent datas have been removed.']);
    }
}
