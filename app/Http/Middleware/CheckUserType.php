<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = Auth::user();
        $userType = $user->typeUser;
        $type_user = $userType->pluck('user.role')->toArray();

        if ($user) {
           foreach($types as $type){
                if(in_array($type_user, $type)  ){
                    return $next($request); 
                }
             }

        } else {
                // Redirection en fonction du type d'utilisateur
                    $message = "veuillez vous connectez avec un compte valide";
                    session()->flash($message);
                    return redirect('/');
                
                }
    }
            }
        