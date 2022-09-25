<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *    version="1.0.0",
 *    title="Capitalwise  API Documentation",
 *    description="A simple integration for capitalwise",
 * )
 * 
 * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Capitalwise API Server"
     * )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
