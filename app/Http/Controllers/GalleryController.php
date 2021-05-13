<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller {
	//show the gallery
	public function index() {
		$images = Gallery::get();
		return view('gallery.index', compact('images'));
	}

	//upload picture to gallery
	public function upload(Request $request) {

		$this->validate($request, [
			'title' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
		]);

		$input['image'] = time() . '.' . $request->image->getClientOriginalExtension();

		$request->image->move(public_path('images'), $input['image']);

		$input['title'] = $request->title;

		Gallery::create($input);

		return back()->with('success', 'Image Uploaded successfully.');
	}

	public function destroy($id) {
		Gallery::find($id)->delete();
		return back()->with('success', 'Image removed successfully.');
	}
}
