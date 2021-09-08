<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Contact;
use Illuminate\Support\Facades\URL;


class ApiContactController extends BaseController
{
    public function index() {
        $contact = Contact::find(1);
        return $this->sendResponse($contact, 'Contact obtained successfully.', '200');
    }

    public function reachUs() {
        $contact = Contact::find(1);
        $reach_us_image = URL::to('/').$contact->reach_us_image;
        return $this->sendResponse($reach_us_image, 'Reach Us Image obtained successfully.', '200');
    }
}
