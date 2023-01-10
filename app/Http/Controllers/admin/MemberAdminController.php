<?php

namespace App\Http\Controllers\admin;

use App\Models\Member;
use App\Models\Girlgroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberAdminController extends Controller
{
    public function index(Member $member)
    {
        return view('categories.index', [
            'members'=>Member::all(),
            'data'=>$member,
            'group'=>Girlgroup::all()
        ]);
    }

    public function show(Member $member)
    {
        return view('categories.detail_member',[
            'member'=>$member,
            'group'=>Girlgroup::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'group_id'=>'required',
            'name'=>'required',
            // 'group_name'=>'required',
            'age'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
            'image'=>'image|file|max:9024',
        ]);

        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Member::create($validateData);
        return redirect('/dashboard/all')->with('success', 'Member has been added !');
    }

    public function update(Request $request, Member $member)
    {
        
        $validateData = $request->validate([
            'group_id'=>'required',
            'name'=>'required',
            'age'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
            'image'=>'image|file|max:9024',
        ]);

         if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Member::where('id',$member->id)->update($validateData);
        return redirect('/dashboard/all')->with('success', 'Member has been updated !');
    }

    public function destroy(Member $member)
    {
        Member::destroy($member->id);
        return redirect('/dashboard/all')->with('success', 'Member has been deleted !');
    }
}
