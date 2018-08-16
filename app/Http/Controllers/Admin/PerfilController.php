<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileFormRequest;

class PerfilController extends Controller
{
    public function profile()
    {
        return view('site.profile.profile');
    }

    public function profileUpdate(UpdateProfileFormRequest $request)
    {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $data['image'] = $user->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            /*
            if ($user->image) {
                $name = $user->image;
            } else {
                $name = $user->id.kebab_case($user->name);
            }
            */
            $name = $user->id.kebab_case($user->name).date('dmYHis');

            $extension = $request->image->extension();
            $namefile = "{$name}.{$extension}";

            $data['image'] = $namefile;

            $upload = $request->image->storeAs('users', $namefile);

            if (!$upload) {
                return redirect()->back()->with('error', 'Falha ao fazer upload da imagem!');
            }
        }

        $update = $user->update($data);

        if ($update) {
            return redirect()->route('profile')
                            ->with('success', 'Sucesso ao atualizar!');
        }

        return redirect()->back()->with('error', 'Falha ao atualizar o perfil...');
    }

    public function Logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
