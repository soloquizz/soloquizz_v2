<?php

namespace App\Http\Middleware;

use App\Models\Administration\DumpUser;
use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CheckCurrentDump
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $dumpUsers = DumpUser::where('user_id',$user->id)->where('etat',0)->get();
        $route_name = $request->route()->getName();
        if ($dumpUsers->count()>0){
            $dumpUser = $dumpUsers->first();
            if ($route_name == 'etudiant.dumps.take' or $route_name == 'etudiant.dumps.store'){
                return $next($request);
            }
            Alert::warning('Avertissement',"Vous avez lancé un entrainement il faut le terminer d'abord !");
            return redirect(route('etudiant.dumps.take',$dumpUser->certification_id));
        }
        return $next($request);
    }
}
