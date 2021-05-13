<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Contacts;

class ContactUsController extends Controller {
	//
	public function index(Request $request) {
		return view('contact.index');
	}

	public function store(Request $request) {
		$data = $request->validate([
			'name'    => 'required',
			'email'   => 'required|email',
			'message' => 'required'
		]);

		Contacts::create($data);

		return redirect(url()->previous())->with('success', 'We have recieved your message, we will get back to you shotrly.');
	}

	public function viewMessages(Request $request) {
		return view('contact.viewAll', ["entries" => Contacts::all()]);
	}
}
