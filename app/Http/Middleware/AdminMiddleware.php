<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (\Auth::user() && \Auth::user()->isAdmin()) {
			return $next($request);
		}

		return redirect(url()->previous())->with([
			'error' => 'You need admin privileges to access this content.'
		]);
	}
}
