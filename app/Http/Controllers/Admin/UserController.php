<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdate;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Dusk\Http\Controllers\UserController as DuskUserController;

class UserController extends Controller
{
    public function index()
    {
        $user = User::orderBy('name')->paginate(20);

        return view('admin.user.index', [
            'userList' => $user
        ]);
    }

    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdate $request, User $user)
    {
        $data = $request->validated();

        $userStatus = $user->fill($data)->save();

        if ($userStatus) {
            return redirect()->route('admin.user.index')
                ->with('success', 'Запись успешно обновлена');
        }

        return back()->with('error', 'Не удалось обновить зпись');
    }

    public function destroy(Request $request, User $user)
    {
        if ($request->ajax()) {
            try {
                $user->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }

}
