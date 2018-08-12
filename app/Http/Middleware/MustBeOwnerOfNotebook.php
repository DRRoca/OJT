<?php

namespace App\Http\Middleware;

use Closure;
// use Illuminate\Support\Facades\Auth;
use App\Notebook;
use App\Note;
use Auth;

class MustBeOwnerOfNotebook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id'); // For example, the current URL is: /posts/1/edit

        $notebook = Notebook::where('user_id', Auth::user()->id)->where('id', $id)->first();
    
        if($notebook) return $next($request); // They're the owner, lets continue...
    
        return redirect()->to('/notebooks'); // Nope! Get outta' here.
        // return $next($request);
    }
}
