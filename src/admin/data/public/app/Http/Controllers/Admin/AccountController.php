<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Lib\HelperTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    use HelperTrait;

    public function profile(){

        $user = Auth::user();
        $member = $user;
        return view('admin.account.profile',compact('user','member'));
    }

    public function saveProfile(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'gender'=>'required',
            'telephone'=>'required',
            'picture' => 'file|max:10000|mimes:jpeg,png,gif',
        ]);

        $requestData = $request->all();
        $user = Auth::user();

        if(isset($requestData['role_id'])){
            $requestData['role_id'] = $user->role_id;
        }



        //check if email exists already
        if(User::where('email',$request->email)->first() && $user->email != $request->email){

          return back()->with('flash_message',__('auth.email-exists'));

        }

        //check for photo
        if($request->hasFile('picture')){
            @unlink($user->picture);

            $path =  $request->file('picture')->store(MEMBERS,'public_uploads');

            $file = 'uploads/'.$path;
            $img = Image::make($file);

            $img->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->save($file);

            $requestData['picture'] = $file;
        }
        else{
            $requestData['picture'] = $user->picture;
        }




        $user->fill($requestData);
        $user->save();

        $customValues = [];
        //attach custom values
        foreach(Field::orderBy('sort_order','asc')->get() as $field){
            if(isset($requestData[$field->id]))
            {
                $customValues[$field->id] = ['value'=>$requestData[$field->id]];
            }


        }

        $user->fields()->sync($customValues);

        return back()->with('flash_message',__('admin.changes-saved'));
    }


    public function password(){
        return view('admin.account.password');
    }

    public function savePassword(Request $request){
        $this->validate($request,[
            'password'=>'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('flash_message',__('admin.changes-saved'));
    }

    public function removePicture(){
        $user = Auth::user();
        @unlink($user->picture);
        $user->picture = null;
        $user->save();
        return back()->with('flash_message',__('admin.picture').' '.__('admin.deleted'));
    }

    public function token(){
        $user = Auth::user();
        return view('admin.account.token',compact('user'));
    }

    public function setToken(){
        $user = Auth::user();
        do{
            $token = bin2hex(random_bytes(16));
        }while(!User::where('api_token',$token));

        $user->api_token = $token;
        $user->token_expires = Carbon::now()->addYears(10)->toDateTimeString();
        $user->save();
        return back()->with('flash_message',__('admin.changes-saved'));
    }

    public function deleteToken(){
        $user = Auth::user();
        $user->api_token = '';
        $user->token_expires = Carbon::now()->addYears(10)->toDateTimeString();
        $user->save();
        return back()->with('flash_message',__('admin.changes-saved'));
    }

}
