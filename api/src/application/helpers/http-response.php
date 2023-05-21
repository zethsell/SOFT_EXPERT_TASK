<?php

namespace Src\Application\Helpers;

class HttpResponse
{
  public static function ok($data)
  {
    return  Response::json($data);
  }

  public static function created($data)
  {
    return Response::json($data, 201);
  }

  public static function noContent()
  {
    return Response::json('', 204);
  }

  public static function forbidden()
  {
    return Response::json(['error' => 'Access denied'], 403);
  }

  public static function badRequest($error = null)
  {
    return Response::json(['error' => mountError($error) ?? 'Bad Request'], 400);
  }

  public static function unauthorized($error = null)
  {
    return Response::json(['error' => mountError($error) ?? 'Unauthenticated'], 401);
  }

  public static function serverError($error = null)
  {
    return Response::json(['error' => mountError($error) ?? 'Server Failed. Try again later!'], 500);
  }

  public static function validationError($error = null)
  {
    return Response::json(['error' => mountError($error) ?? 'Validation Failed.!'], $error->getCode() ?? 400);
  }
}
