<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;
use App\Group;
class ContactController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if($group_id = $request->get('group_id'))
        $contacts = Contact::where('group_id',$group_id)->paginate(10);
      else
        $contacts = Contact::paginate(10);

        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $groups = Group::lists('name','id')->all();
        return view('contacts.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $rules = [
          'name' => ['required','min:5'],
          'email' => 'required',
          'mobile' => 'required'
        ];
        $this->validate($request,$rules);
        if($file = $request->file('photo')){
            $name = date('Y-m-d_h-i-s-').$file->getClientOriginalName();
            $file->move('images/profile_photo',$name);
            $inputs['photo'] = $name;
        }
        if($new_group = $request->get('new_group')){
          $group_id = Group::create(['name'=>$new_group]);
          $inputs['group_id'] = $group_id;
        }
        Contact::create($inputs);
        return redirect('contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = Group::lists('name','id')->all();
        $contact = Contact::findOrFail($id);
        return view('contacts.edit',compact('groups','contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $rules = [
          'name' => ['required','min:5'],
          'mobile' => 'required'
        ];
        $this->validate($request,$rules);
        if($file = $request->file('photo')){
          $name = date('Y-m-d_his-').$file->getClientOriginalName();
          $file->move('images/profile_photo',$name);
          $inputs['photo'] = $name;

          //remove previous photo
          $contact = Contact::find($id);
          unlink(public_path().$contact->photo);
        }
        Contact::find($id)->update($inputs);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contact = Contact::find($id);
      unlink(public_path().$contact->photo);
      //unlink(public_path().'\images\profile_photo\ '.$contact->photo);
      $contact->delete();
      return redirect()->back();
    }
}
