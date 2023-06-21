<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view("addMovieData");
    }

    public function store(Request $request)
    {
        $res = new Film;
        $res->title = $request->input("title");
        $res->description = $request->input("description");
        $res->release_year = $request->input("releaseYear");
        $res->special_features = $request->input("specialFeatures");
        $res->save();
        return redirect("movie-management");
    }


    public function show(Film $film, Request $request, $page = 0)
    {
        if ($page < 0) {
            return redirect("/");
        }
        $title = $request->input('title');
        // if ($title == "") {
        //     return redirect("movie-management");
        // }
        // (a ? b : c) ? d : e` or `a ? b : (c ? d : e)`
        $movies = Film::where('is_deleted', '0')->where('title', 'like', "%" . $title . "%")->offset($page == 1 ? 0 * 10 : ($page == 2 ? 1 * 10 : $page * 10))->limit(10)->get();
        $allMovies = Film::where('is_deleted', '0')->offset($page == 1 ? 0 * 10 : ($page == 2 ? 1 * 10 : $page - 1 * 10))->limit(10)->get();
        $totalCount = Film::count();
        if ($title != "") {
            $totalCount = Film::where('is_deleted', '0')->where('title', 'like', "%" . $title . "%")->offset($page == 1 ? 0 * 10 : ($page == 2 ? 1 * 10 : $page - 1 * 10))->limit(10)->count();
        }
        return view("userManagement")->with([
            "dataArr" => $title === "" ? $allMovies : $movies,
            "page" => $page,
            "total" => $totalCount
        ]);
    }

    public function edit(Film $film, $id)
    {
        $movies = Film::where('film_id', $id)->get();
        return view("editMovieData")->with([
            "id" => $movies[0]->film_id,
            "title" => $movies[0]->title,
            "description" => $movies[0]->description,
            "releaseYear" => $movies[0]->release_year,
            "specialFeature" => $movies[0]->special_features
        ]);
    }

    public function update(Request $request, Film $film)
    {
        $res = Film::find($request->id);
        $res->title = $request->input("title");
        $res->description = $request->input("description");
        $res->release_year = $request->input("releaseYear");
        $res->special_features = $request->input("specialFeatures");
        $res->save();

        return redirect("movie-management");
    }

    public function destroy(Film $film, Request $request)
    {
        $res = Film::find($request->input('deleteIdInput'));
        $res->is_deleted = '1';
        $res->save();
        return redirect("movie-management");
    }
}
