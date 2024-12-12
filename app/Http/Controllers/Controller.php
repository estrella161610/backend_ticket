<?php

namespace App\Http\Controllers;

/**
 * @OA\Info(
 *    title="Swagger API documentation",
 *    version="1.0.0",
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     securityScheme="bearerAuth",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 * 
 * @OA\Server(
 *    url="http://localhost:8000",
 *   description="Demo API Server"
 * )
 *
 */

abstract class Controller
{
    //
}
