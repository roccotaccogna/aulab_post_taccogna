<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user){
        $user->update([
            'is_admin' => true,
        ]);

        return redirect(route('admin.dashboard'))->with('status', 'Hai correttamente reso Amministratore l\'utente scelto');
    }

    public function setAdmin2(User $user){
        $user->update([
            'is_admin' => false,
        ]);

        return redirect(route('admin.dashboard'))->with('status2', 'Hai rifiutato l\'utente scelto come Amministratore');
    }

    public function setRevisor(User $user){
        $user->update([
            'is_revisor' => true,
        ]);

        return redirect(route('admin.dashboard'))->with('status', 'Hai correttamente reso Revisore l\'utente scelto');
    }

    public function setRevisor2(User $user){
        $user->update([
            'is_revisor' => false,
        ]);

        return redirect(route('admin.dashboard'))->with('status2', 'Hai rifiutato l\'utente scelto come Revisore');
    }

    public function setWriter(User $user){
        $user->update([
            'is_writer' => true,
        ]);

        return redirect(route('admin.dashboard'))->with('status', 'Hai correttamente reso Redattore l\'utente scelto');
    }

    public function setWriter2(User $user){
        $user->update([
            'is_writer' => false,
        ]);

        return redirect(route('admin.dashboard'))->with('status2', 'Hai rifiutato l\'utente scelto come Redattore');
    }

    public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name' => 'required|unique:tags|alpha',
        ]);

        $tag->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('status', 'Tag Aggiornato');
    }

    public function deleteTag(Tag $tag){
        foreach($tag->articles as $article){
            $article->tags()->detach($tag);
        };

        $tag->delete();

        return redirect(route('admin.dashboard'))->with('status2', 'Tag Eliminato');

    }

    public function editCategory(Request $request, Category $category){
        $request->validate([
            'name' => 'required|unique:categories|alpha',
        ]);

        $category->update([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('status', 'Categoria Aggiornata');
    }

    public function deleteCategory(Category $category){
        foreach($category->articles as $article){
            $article->update([
                'category_id' => NULL,
            ]);
        }
        $category->delete();

        return redirect(route('admin.dashboard'))->with('status2', 'Categoria Eliminata');
    }

    public function storeCategory(Request $request){
        $request->validate([
            'name' => 'alpha',
        ]);

        Category::updateOrCreate([
            'name' => strtolower($request->name),
        ]);

        return redirect(route('admin.dashboard'))->with('status', 'Nuova Categoria creata correttamente');
    }
    
}
