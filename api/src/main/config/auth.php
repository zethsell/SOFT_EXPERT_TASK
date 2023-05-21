<?php

namespace Src\Main\Config;

class Auth
{
  public static function user()
  {
    return (object) $_SESSION['auth'];
  }

  public static function setSession($data)
  {
    $_SESSION['auth'] = $data;
  }
}
