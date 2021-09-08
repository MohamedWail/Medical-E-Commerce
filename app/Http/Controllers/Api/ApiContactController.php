<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Contact;

class ApiContactController extends BaseController
{
    public function index() {
        $contact = Contact::find(1);
        return $this->sendResponse($contact, 'Contact obtained successfully.', '200');
    }
}
