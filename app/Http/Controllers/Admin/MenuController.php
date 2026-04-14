<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
          'name' => 'required|unique:our_menus'
        ]);
        
        $information = new \App\OurMenu;
        $information->name = $request->name;
        $information->save();
     
        return redirect('admin/menu')->with('msg', 'Information Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = \App\OurMenu::with('pageMenu')->find($id);
        $allPages = \App\AllPage::get();

        return view('admin.menu.show', compact('information', 'allPages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $information = \App\OurMenu::find($id);
        return view('admin.menu.edit', compact('information'));
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
        
        $request->validate([
          'name' => 'required'
        ]);
        
        $information = \App\OurMenu::find($id);
        $information->name = $request->name;
        $information->save();
     
        return redirect('admin/menu')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = \App\OurMenu::find($id);
          $information->delete();
        return redirect('admin/menu')->with('msg', 'Information Deleted');
        
    }
    public function createMenu($id){
         $menu = \App\OurMenu::find($id);
        $allPages = \App\AllPage::all()->pluck('title', 'id')->toArray();
        return view('admin.menu.create-menu', compact('menu', 'allPages'));
    }
    public function storeMenu(Request $request){
        $information = new \App\PageMenu;
        $information->our_menu_id = $request->our_menu_id;
        $information->all_page_id = $request->all_page_id;
        $information->order = $request->order;
        $information->save();
         return redirect()->action('Admin\MenuController@show', ['id' => $request->our_menu_id])->with('msg', 'Information Added');

    }
    //this is for destroy for menu 
    public function destroyMenu($id){
        $information = \App\PageMenu::find($id);
       $information->delete();
       return back()->with('msg', 'Information Deleted ');
    }

    //this is for edit
    public function editMenu($id){
        $information = \App\PageMenu::find($id);
        // $menu = \App\OurMenu::find($id);
                $allPages = \App\AllPage::all()->pluck('title', 'id')->toArray();
    return view('admin.menu.edit-menu', compact('information', 'allPages'));
    }

    public function updateMenu(Request $request, $id){
        $information = \App\PageMenu::find($id);
         $information->our_menu_id = $request->our_menu_id;
        $information->all_page_id = $request->all_page_id;
        $information->order = $request->order;
        $information->save();
         return redirect()->action('Admin\MenuController@show', ['id' => $request->our_menu_id])->with('msg', 'Information Updated');


    }
    //this is for subMenu
    public function subMenuAdd(Request $request){

        $information = new \App\SubMenu;
        $information->parent_id = $request->parent_id;
        $information->child_id = $request->child_id;
        $information->save();
        return back()->with('msg', "information Added");
    }

    // submenu remove
    public function subMenuRemove($id){
        $information = \App\SubMenu::find($id);
        $information->delete();
        return back()->with('msg', 'Information Deleted');
    }

}





