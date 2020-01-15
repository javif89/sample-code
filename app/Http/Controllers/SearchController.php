<?php

namespace App\Http\Controllers;

use App\Article;
use App\Career;
use App\Event;
use App\Product;
use App\Promotion;
use Illuminate\Http\Request;


class SearchController extends Controller
{

    public function admin(Request $request)
    {
        $user = \Auth::user();

        $products = Product::performSearch($request->get('query'));
        $promotions = Promotion::performSearch($request->get('query'));

        if ($user->can('superadmin')) {
            $careers = Career::search($request->get('query'))->get();
            $events = Event::search($request->get('query'))->get();
        }

        return response()->json(
            [
                'products' => $products,
                'promotions' => $promotions ?? null,
                'careers' => $careers ?? null,
                'events' => $events ?? null,
            ]
        );
    }

    public function front(Request $request)
    {
        if ($query = $request->get('query')) {
            if (!empty($query)) {
                $products = Product::performSearch($query);
                $events = Event::search($query)->get();
                $articles = Article::search($query)->get();

                return response()->json(
                    [
                        'products' => $products,
                        'events' => $events ?? null,
                        'articles' => $articles ?? null
                    ]
                );
            }
        }

    }
}
