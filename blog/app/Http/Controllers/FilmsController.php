<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use Auth;
use View;


class FilmsController extends Controller
{
    public function film($id){
        $film = DB::table('films')->find($id);
        
        
            $check = DB::table('favorite')->where('film_id', $id)->first();
        
        return view('films.film', [
            'check'        => $check,
            'film'  => $film
        ]);
    }
    
    public function cabinet(){
        $favorite = DB::table('films')->whereIn('id', function($query) {
            $query->select('film_id')->from('favorite')->where('user_id', Auth::id());
        })->get();
        //$favorite = App\Films::whereIn('id',App\Favorites::where('user_id', 2)->pluck('film_id'))->get();
        //dd($favorite);        
        return view('films.cabinet', compact('favorite'));
    }
    public function catalog(){
        $films = DB::table('films')->get();
        if(!empty($_GET['category'])){
            $films = DB::table('films')->where('category',"like",$_GET['category'])->get();
        }
        
        $filter = DB::table('films')->select("category")->groupBy('category')->get();
        
        
        return view('films.filmscat', [
            'films'=>$films,
            'filter'=>$filter
        ]);
    }
    
    public function addFavorite($id){
        $favorite = DB::table('favorite')->where([
        ['user_id', '=', Auth::id()],
        ['film_id', '=', $id]])->first();
            if(empty($favorite)){
                DB::table('favorite')->insert(
                    ['film_id' => $id, 'user_id' => Auth::id()]
                );
            }
            return redirect("catalog/{$id}");    
    }
    
    public function deleteFavorite($id){
        $favorite = DB::table('favorite')->where([
        ['user_id', '=', Auth::id()],
        ['film_id', '=', $id]])->first();
            if(!empty($favorite)){
                DB::table('favorite')->where([['film_id', $id], ['user_id', Auth::id()]])->delete();
            }
            return redirect("cabinet");    
    }
}
