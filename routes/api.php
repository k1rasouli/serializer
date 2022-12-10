<?php

use App\libs\api\mapper\core\JSON;
use App\libs\api\mapper\core\XML;
use App\libs\api\mapper\Mapper;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    /*
     * Creating 2 objects of same class.
     * First one is for XML.
     * Second one is for JSON.
     * Strategy design pattern is used for implementation
     */
    $objXMLMapper = new Mapper('https://xml.eduvation.ir/', new XML(get_class(new Employee())));
    $objJSONMapper = new Mapper('https://json.eduvation.ir/', new JSON(get_class(new Employee())));

    /*
     * Final mapped data is saved in apiMappedResult
     */
    $apiMappedResult = array_merge($objXMLMapper->mapping(), $objJSONMapper->mapping());

    /*
     * Returning result as json and status code 200
     */
    return response()->json($apiMappedResult, Response::HTTP_OK);
});
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
