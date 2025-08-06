<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Submenu;

class FrontController extends Controller
{
    public function index()
    {
        $menus = Menu::with ( 'submenus' )->get ();
        $posts = Post::where('status',1)->with ( 'files' )->limit ( 2)->orderBy ( 'created_at', 'desc' )->get ();
        $manages = Manage::limit(3)->orderBy ( 'created_at', 'asc' )->get ();
        return view ( 'front.index', compact ( 'menus', 'posts', 'manages' ) );
    }

    public function page($slug)
    {
        $menu = Menu::where ( 'slug', $slug )->first ();
        $submenu = Submenu::where ( 'slug', $slug )->with ( 'services' )->first ();
        $post = Post::where ( 'slug', $slug )->first ();
        $posts = Post::where('status',1)->orderBy ( 'created_at', 'desc' )->paginate ( 9 );
        $manages = Manage::all ();

        if ($post) {
            $post->increment('view');
            $post->save();
        }

        if ($menu) {
            // Menu uchun ko'rinishni dinamik tarzda yuklash
            return view ( 'front.menus.' . $menu->view_template, ['item' => $menu, 'posts' => $posts, 'manages' => $manages] );
        } elseif ($submenu) {
            return view ( 'front.submenus.' . $submenu->view_template, ['item' => $submenu, 'manages' => $manages] );
        } elseif ($post) {
            return view ( 'front.posts.default', ['item' => $post] );
        } else {
            abort ( 404 );
        }
    }
}
