<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function customers(){
        $data = Customer::paginate(3);
        return view('home.customers_list',compact('data'));
    }
    public function addCustomers(){
       
        return view('home.addCustomers');
    }
    public function newCustomersStore(Request $request){
        $data= $request->all();
        $validatedata = $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "tel"=>array([
                "required",
                "regex:/^(?=.*[0-9])/",
                "unique:customers",
            ]),
            "adresse"=>"required",
            "photo"=>"required|mimes:jpg,jpeg,png",
            "cni"=>array([
                "required",
                "regex:/^(?=.*[0-9])/",
                "min:14",
                "unique:customers",
            ]),
            "email"=>array([
                "required",
                "unique:customers",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ])
        ]);
        $photo = $request->file("photo");
        $image = null;
        if($request->hasFile("photo")){
           $image = $photo->store("avatar");
        }

        $save = Customer::updateOrCreate([
            "nom"=>$data['nom'],
            "prenom"=>$data["prenom"],
            "tel"=>$data["tel"],
            "adresse"=>$data["adresse"],
            "photo"=>$image,
            "cni"=>$data["cni"],
            "email"=>$data["email"],
        ]);
        return redirect()->route("customers")->with('customerAddSuccessfully','Nouveau Client bien enregistré!!!');
    }
    public function modifyForm($id){
        $data = Customer::find($id);

        //dd($data);
        return view('home.modifyForm',compact('data','id'));
    }

    public function modifyCustomerStore(Request $request,$id){

        $data =$request->all();

       /*  $validatedata = $request->validate([
            "nom"=>"required",
            "prenom"=>"required",
            "tel"=>array([
                "required",
                "regex:/^(?=.*[0-9])/",
                "unique:customers",
            ]),
            "adresse"=>"required",
            "photo"=>"required|mimes:jpg,jpeg,png",
            "cni"=>array([
                "required",
                "regex:/^(?=.*[0-9])/",
                "min:14",
                "unique:customers",
            ]),
            "email"=>array([
                "required",
                "unique:customers",
                "regex:/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/",
            ])
        ]); */

        /* $photo = $request->file('photo'); */
       /*  isset($data)
        if ($request->hasFile('photo')){
            $image=$photo->store('avatar');
        } */
        
        $image=null;
        $customer=Customer::where('id', $id)->first();
        if ($customer) {
           $image=$customer->photo;
        }
        if (isset($data['photo']) && $request->hasFile('photo')) {
            $image=$data['store']->store('avatar');
        }

        $save = Customer::where('id',$id)->update([
            "nom"=>$data["nom"],
            "prenom"=>$data["prenom"],
            "tel"=>$data["tel"],
            "adresse"=>$data["adresse"],
            "photo"=>$image,
            "cni"=>$data["cni"],
            "email"=>$data["email"],
        ]);
      return redirect()->route('customers')->with('updateCustomers','Modifications enregistrées avec succès.');
        
    }
    public function seeMore( $id = null){

        $ids = Customer::find($id);
       
        $customers = Customer::all();
       // dd($customers );

        return view('home.addCustomers',compact('customers','ids'));
        
    }
    public function customerDelete($id){
        
        $idAll = Customer::where('id',$id)->delete();

        return redirect()->back()->with('sucessDeleteCustomer','Client suppprimé avec succès.');

    }
}
