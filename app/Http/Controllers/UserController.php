<?php

namespace App\Http\Controllers;

use SplSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function login(){
        return view('users.login');
    }
    public function register(){
        return view('users.register');
    }
    public function logout(){
        return view('users.login');
    }
    public function registerStore(Request $request){
        $data = $request->all();
        $validateData = $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'email'=>array([
                "required",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
                "unique:users",
            ]),
            'password'=>array([
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
                "confirmed:password_confirmation"
            ])
        ]);
        $save = User::create([
            'nom'=>$data['nom'],
            'prenom'=>$data['prenom'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);

        $url =URL::temporarySignedRoute(
            'verifyEmail', now()->addMinutes(30),['email'=>$data['email']]
        
        );

        Mail::send('users.mail',['url'=>$url,'name'=>$data['nom'].' '.$data['prenom']] , function($message) use ($data){
            $config=config('mail');
            $name =$data['nom'].' ' .$data['prenom'];
            $message -> subject("Email de vérification")
                    ->from($config['from'][ 'address'],"Ecole 229 TP")
                    ->to($data['email'] , $data['nom'].' '.$data['prenom']);
                
        });
        return redirect()->back()->with('message','Veuillez consultez votre mail pour activer votre compte');
    }
    public function verifyEmail(Request $request,$email){
        $user = User::where('email',$email)->first();
        if(!$user){
            abort (404);
        }
        if(!$request->hasValidSignature()){
            abort (404);
        }
        $user->update([
            'verify_at' => now(),
            "email_verified" => true
        ]);
        
      return redirect()->route('login')->with('success','Compte activé avec succes');
    }
    public function modifypassword(){
        return view('users.modifyUserPassword');

    }
    public function modifyUserStore(Request $request){
        $data =$request->all();
        //dd($data);
       $validateEmail = $request->validate([
        'email'=> "required|regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/"
       ]);
       $verify = User::where('email',$request->email)->first();
      if(!$verify){
        return redirect()->back()->with('error','Mail invalid');
      }
      else{
        $url = URL::temporarySignedRoute(
            "modifyVerify",
            now()->addMinutes(30),
            ['email'=>$data['email']]
        );
       // $verify = User::where('email',$request->email)->select('nom','prenom')->get();
       
        Mail::send('users.modifyMail',['url'=>$url ,'name'=>$verify['nom'].' '.$verify['prenom']],function($message) use($verify){
            $config = config('mail');
            $name = $verify['nom'].' '.$verify['prenom'];
            $message -> Subject('Reinitialisation de mot de passe')
                    ->from($config['from']['address'], "Ecole 229  TP")
                    ->to($verify['email'] , $name);
        });
        return redirect()->back()->with('resetMessage','Veuillez consultez votre boite mail pour modifier votre mot de passe');
      }
      
      
    }
    public function modifyVerify(Request $request,$email){
        $user = User::where('email',$email)->first();
        if(!$user){
            abort(404);
        }
        if(!$request->hasValidSignature()){
            abort(404);
        }
        return view('users.accessReset',compact('email'));
    }
    public function reinitialize(Request $request){
        $user = User::where('email',$request->email)->first();
        $data = $request->all();
        $validatePassword = $request->validate([
            'newpassword' => array([
                "required",
                "regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&#^_;:,])[A-Za-z\d@$!%*?&#^_;:,]{8,}$/",
            ]),
            "confirmed:newpassword_confirmation"
        ]);
        $update = User::where('email',$request->email)->update([
            'password'=>Hash::make($data['newpassword'])
        ]);
        return redirect()->route('login')->with('resetSuccess','Mot de passe réinitialisé avec succès!!!');

    }

    public function loginStore(Request $request){
        $data= $request->all();
        $email = $request->email;
        $user = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'email_verified'=>true,
        ]);
        if($user){
            return redirect()->route('customers');
        }
        else{
            return redirect()->back()->with('loginError',' Indentifiants non valides!!!');
          
        }
    }

}
