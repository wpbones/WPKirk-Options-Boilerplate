<?php

namespace WPKirk\Http\Controllers\Options;

use WPKirk\Http\Controllers\Controller;

if (!defined('ABSPATH')) {
  exit();
}

class OptionViewController extends Controller
{
  public function index()
  {
    return WPKirk()
      ->view('dashboard.view')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common');
  }

  public function saveOptions()
  {
    $feedback = 'Action Not Allowed!';

    if ($this->request->verifyNonce('Options')) {
      WPKirk()->options->update($this->request->getAsOptions());
      $feedback = 'Options updated!';
    }

    return WPKirk()
      ->view('dashboard.view')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common')
      ->with('feedback', $feedback);
  }
}
