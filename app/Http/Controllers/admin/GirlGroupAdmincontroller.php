<?php

namespace App\Http\Controllers\admin;

use App\Models\Girlgroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GirlGroupAdmincontroller extends Controller
{
    public function index()
    {
        return view('categories.girl', [
            'girl'=>Girlgroup::all()
        ]);
    }

    public function show(Girlgroup $group)
    {
        return view('categories.detail_group',[
            'group'=>$group
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'group_name'=>'required',
            'group_description'=>'required',
            'group_image'=>'image|file|max:9024',
        ]);

        if ($request->file('group_image')) {
            $validateData['group_image'] = $request->file('group_image')->store('post-images');
        }

        Girlgroup::create($validateData);
        return redirect('/dashboard/girl')->with('success', 'group has been added !');
    }

    public function update(Request $request, Girlgroup $group)
    {
        $validateData = $request->validate([
            'group_name'=>'required',
            'group_description'=>'required',
            'group_image'=>'image|file|max:9024',
        ]);

        if ($request->file('group_image')) {
            $validateData['group_image'] = $request->file('group_image')->store('post-images');
        }

        Girlgroup::where('id',$group->id)->update($validateData);
        return redirect('/dashboard/girl')->with('success', 'group has been updated !');
    }

    public function destroy(Girlgroup $group)
    {
        Girlgroup::destroy($group->id);
        return redirect('/dashboard/girl')->with('success', 'Group has been deleted !');
    }
}
