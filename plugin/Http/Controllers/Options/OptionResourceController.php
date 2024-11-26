<?php

namespace WPKirk\Http\Controllers\Options;

use WPKirk\Http\Controllers\Controller;

if (!defined('ABSPATH')) {
  exit();
}

class OptionResourceController extends Controller
{
  public function load()
  {
    if ($this->request->get('_redirect')) {
      $this->redirect($this->request->get('_redirect'));
      exit();
    }
  }

  // GET
  public function index()
  {
    return WPKirk()
      ->view('dashboard.resource')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common')
      ->with('method', 'GET');
  }

  // POST
  public function store()
  {
    return WPKirk()
      ->view('dashboard.resource')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common')
      ->with('method', 'POST');
  }

  // PUT AND PATCH
  public function update()
  {
    return WPKirk()
      ->view('dashboard.resource')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common')
      ->with('method', 'PUT AND PATCH');
  }

  // DELETE
  public function destroy()
  {
    return WPKirk()
      ->view('dashboard.resource')
      ->withAdminStyle('prism')
      ->withAdminScript('prism')
      ->withAdminStyle('wp-kirk-common')
      ->with('method', 'DELETE');
  }
}
