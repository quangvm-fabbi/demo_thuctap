<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Mail;
use App\Models\Cake;
use App\Models\Image;
use App\Models\Order;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use App\Http\Controllers\admin\CategoryController;
use App\Repositories\cake\CakeRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Mail\OrderConfirmation;

class PagesController extends Controller
{
    protected $cake;
    protected $category;

    public function __construct(CakeRepositoryInterface $cake, CategoryRepositoryInterface $category)
    {
        $this->category = $category;
        $this->cake = $cake;
    }

    public function getHome()
    {
        $cakes = $this->cake->getAllCake();
        $category = $this->category->getAll();
        $data['best_seller'] = DB::select(DB::raw('SELECT * FROM cakes p INNER JOIN (SELECT ps.cake_id, SUM(ps.quanity) sum_quanity FROM cake_order ps GROUP BY ps.cake_id ORDER BY sum_quanity DESC LIMIT 4) po ON p.id = po.cake_id'));
        $cake = array_column($data['best_seller'], 'id');
        $cake1 = Cake::whereIn('id', $cake)->with('images')->get();

        return view('pages.home', compact('cakes', 'category', 'cake1'), $data);
    }

    public function getCakeDetail(Request $request, $id)
    {
        try {
            if(auth()->check()){
            $cake = Cake::findOrFail($id);
            $user = auth()->user()->id;
            $cake->users()->attach($user);
        }else {
             $cake = Cake::findOrFail($id);
        }
            $images = Image::where('cake_id', $request->id)->get();
            return view('pages.CakeDetail', compact('cake', 'images'));
        } catch (ModelNotFoundException $e) {
            echo $e->getMessage();
        }
    }

    public function getCakeByCategory(Request $request, $id)
    {
        $cake = Cake::where('category_id',$id)->with('images')->get();


        return view('pages.AllCake', compact('cake'));
    }

    public function allCake(Request $request)
    {
        // $cake = $this->cake->allCake();
        // $categories = $this->category->getAll();
        $cake = Cake::orderBy('id', 'desc');

        if($orderBy = $request->input('orderBy')) {
            switch ($orderBy) {
                case 'lastest':
                    $cake = Cake::orderBy('id', 'desc');
                break;
                case 'oldest':
                    $cake = Cake::orderBy('id', 'asc');
                break;
                case 'highest':
                    $cake = Cake::orderBy('price', 'desc');
                break;
                case 'lowest':
                    $cake = Cake::orderBy('price', 'asc');
                break;
                default:
               
                break;
            
            }
        }

        if($search = $request->input('search')) {
            // $cake->where(function($query) use ($search){
            //     $query->where('name', 'like', "%$search%");
            // });
            $cake->where('name', 'like' , "%$search%");
        }

        if ($category = $request->input('category') ) {
            $cake->where('category_id', $category)->with('images')->get();
        }

        $data['cake'] = $cake->paginate(8);

        return view('pages.AllCake', $data);


    }

    public function myAcount()
    {
        $id = auth()->user()->id;

        $cakes = Order::where('user_id', $id)->get();

        $users = User::findOrFail($id);

        $views = $users->cakes()->limit(5)->get();


        return view('pages.MyAcount', compact('cakes', 'views'));

    }
}
