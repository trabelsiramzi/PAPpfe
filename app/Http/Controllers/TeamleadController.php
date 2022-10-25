<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Teamlead;
use App\Models\Manager;
use App\Models\Report;
use DB;
use Session;
use Image;
use Illuminate\Http\Request;

class TeamleadController extends Controller
{
    // --------- SHARED -------------
    public function showManageTeamlead()
    {

        if(Session::get('userType') != 'manager')
        {
            $teamleads = DB::table('teamleads')
                ->join('departments','departments.id','=','teamleads.department_id')
                ->join('managers','managers.id','=','teamleads.manager_id')
                ->select('teamleads.*','departments.department_name','managers.manager_official_id')
                ->get();
            return view('admin.teamlead.manage-teamlead',[
                'teamleads'=>$teamleads
            ]);

        }
        else
        {
            $managerId = Session::get('userId');
            $teamleads = DB::table('teamleads')
                ->where('manager_id','=',$managerId)
                ->join('departments','departments.id','=','teamleads.department_id')
                ->join('managers','managers.id','=','teamleads.manager_id')
                ->select('teamleads.*','departments.department_name','managers.manager_official_id')
                ->get();
            return view('manager.teamlead.manage-teamlead',[
                'teamleads'=>$teamleads
            ]);
        }

    }
    public function showTeamleadDetails($id)
    {
        $teamlead = teamlead::find($id);
        $manager = Manager::find($teamlead->manager_id);
        $department = Department::find($teamlead->department_id);
        if(Session::get('userType') == 'manager')
        {
            return view('manager.teamlead.teamlead-details',[
                'teamlead'=>$teamlead,
                'manager'=>$manager,
                'department'=>$department
            ]);
        }
        else
        {
            return view('admin.teamlead.teamlead-details',[
                'teamlead'=>$teamlead,
                'manager'=>$manager,
                'department'=>$department
            ]);
        }
    }
    public function deleteTeamlead($id)
    {
        $teamlead = teamlead::find($id);
        $teamlead->delete();
        return route('manage-teamlead')->with('message','teamlead removed successfully');
    }

    //-------------------------------



    public function showManageTeamleadToAdmin()
    {
        return view("admin.teamlead.manage-teamlead");
    }
    public function showAddTeamlead()
    {
        $managerId = Session::get('userId');
        $manager = Manager::find($managerId);
        $department = Department::where('id','=',$manager->department_id)->first();

        return view('manager.teamlead.add-teamlead',[
            'department'=>$department,
            'managerId'=>$managerId
        ]);
    }
    protected function uploadTeamleadImage($request){
        $teamleadImage = $request->file('teamlead_image');
        $imageType = $teamleadImage->getClientOriginalExtension();
        $imageName = $request->first_name.' '.$request->last_name.'.'.$imageType;
        $directory = 'admin/teamlead-images/';
        $imageUrl = $directory.$imageName;
        Image::make($teamleadImage)->save($imageUrl);
        return $imageUrl;

    }
    protected function validateTeamleadInfo($request)
    {
        $this->validate($request,[
            'department_id'=> 'required',
            'manager_id'=> 'required',
            'teamlead_official_id'=> 'required',
            'first_name'=> 'required|max:15|min:3',
            'last_name'=> 'required|max:20|min:3',
            'email'=> 'required|unique:teamleads,email',
            'phone_number'=> 'required|max:15|min:15',
            'gender'=> 'required',
            'date_of_birth'=> 'required',
            'teamlead_salary'=> 'required',
            'teamlead_account_number'=> 'required|unique:teamleads,teamlead_account_number',
            'qualification'=> 'required',
            'user_name'=> 'required|max:15|min:5|unique:teamleads,user_name',
            'password'=> 'required|max:25|min:8|unique:teamleads,password',
            'address'=> 'required',
            'manager_image'=> 'required',
        ]);
    }
    public function saveTeamlead(Request $request)
    {try{
        $this->validateTeamleadInfo($request);
        $imageUrl = $this->uploadTeamleadImage($request);

        $teamlead = new teamlead();
        $teamlead->department_id =$request->department_id;
        $teamlead->manager_id =$request->manager_id;
        $teamlead->teamlead_official_id =$request->teamlead_official_id;
        $teamlead->first_name =$request->first_name;
        $teamlead->last_name =$request->last_name;
        $teamlead->email =$request->email;
        $teamlead->phone_number =$request->phone_number;
        $teamlead->gender =$request->gender;
        $teamlead->date_of_birth =$request->date_of_birth;
        $teamlead->teamlead_salary =$request->teamlead_salary;
        $teamlead->teamlead_account_number =$request->teamlead_account_number;
        $teamlead->qualification =$request->qualification;
        $teamlead->user_name =$request->user_name;
        $teamlead->password =$request->password;
        $teamlead->address =$request->address;
        $teamlead->teamlead_image = $imageUrl;
        $teamlead->save();
        return redirect('/teamlead/add')->with('message','teamlead saved successfully');
    }
    catch(\Exception $e){
       // do task when error
       echo $e->getMessage();   // insert query
    }
        
    }




    // ------------ teamlead -----------


    public function showTeamleadProfile()
    {
        $teamleadId = Session::get('userId');
        $teamlead = teamlead::find($teamleadId);
        $manager = Manager::find($teamlead->manager_id);
        $department = Department::find($teamlead->department_id);
        return view('teamlead.profile.profile',[
            'teamlead'=>$teamlead,
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    public function editTeamleadProfile()
    {
        $teamleadId = Session::get('userId');
        $teamlead = teamlead::find($teamleadId);
        $manager = Manager::find($teamlead->manager_id);
        $department = Department::find($teamlead->department_id);
        return view('teamlead.profile.edit-profile',[
            'teamlead'=>$teamlead,
            'manager'=>$manager,
            'department'=>$department
        ]);
    }
    protected function validateUpdateTeamleadInfo($request)
    {
        $this->validate($request,[
            'first_name'=> 'required|max:15|min:3',
            'last_name'=> 'required|max:20|min:3',
            'phone_number'=> 'required|max:15|min:15',
            'date_of_birth'=> 'required',
            'teamlead_account_number'=> 'required|unique:teamleads,teamlead_account_number',
            'address'=> 'required',
        ]);
    }

    public function  updateTeamleadProfile(Request $request){

        $teamlead = teamlead::find($request->teamlead_id);
        $teamlead->first_name =$request->first_name;
        $teamlead->last_name =$request->last_name;
        $teamlead->phone_number =$request->phone_number;
        $teamlead->date_of_birth =$request->date_of_birth;
        $teamlead->teamlead_account_number =$request->teamlead_account_number;
        $teamlead->address =$request->address;
        $image = $request->file('teamlead_image');
        if($image)
        {
            unlink($teamlead->teamlead_image);
            $imageUrl = $this->uploadTeamleadImage($request);
            $teamlead->manager_image = $imageUrl;
        }
        $teamlead->save();
        return redirect('/teamlead/profile')->with('message','Profile updated successfully');
    }


}
