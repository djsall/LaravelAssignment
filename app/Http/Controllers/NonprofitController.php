<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NonprofitController extends Controller {
	//
	public function page1(Request $request) {
		return view("nonprofit.page1");
	}

	public function page2(Request $request) {
		return view("nonprofit.page2");
	}

	public function page3(Request $request) {
		return view("nonprofit.page3");
	}

	public function page4(Request $request) {
		return view("nonprofit.page4");
	}

	public function page5(Request $request) {
		return view("nonprofit.page5");
	}
}
