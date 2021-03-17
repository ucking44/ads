<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\MainCategory;
use App\City;
use App\Advertisement;
use App\States;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class UsersController extends Controller
{
    public function index()
    {
        $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
        return view('users.user', compact('categories'));
    }

    public function fetch(Request $request)
    {
        if ($request->get('naijastates'));
        {
            $query = $request->get('naijastates');
            $data = DB::table('states')
                    ->where('stateName', 'like', '%' .$query. '%')
                    ->get();

            $output = '<ul style="display:block !important;" class="dropdown-menu">';
            if ($data->count() > 0)
            {
                foreach($data as $row) {
                    $output .= '<li class="searchState" id="search" name="searchState" style="cursor:pointer;" value=' . $row->id .'>' .$row->stateName. '</li>';
                }
                $output .= '</ul>';
                echo $output;
            }
            else {
                $output .= '<li>Record not found!</li>';
                echo $output;
            }
        }
    }

    public function cities(Request $request)
    {
        if($request->get('id'))
        {
            $query = $request->get('id');
            $data = DB::table('cities')
                    ->where('state_id', 'like', '%' .$query. '%')
                    ->get();
            $output = '';
            if ($data->count() > 0)
            {
                foreach($data as $row) {
                    $output .= '<li id="searchCity" name="searchCity" style="cursor:pointer;">' .$row->cityName. '</li>';
                }
                $output .= '';
                echo $output;
            }
            else {
                $output .= '<li>City not found!</li>';
                echo $output;
            }
        }
    }

    public function retrieve(Request $request)
    {
        $data = DB::table('main_categories')->get();
        $output = '';
        if ($data->count() > 0)
        {
            foreach($data as $row) {
                $output .= '<option value='.$row->id.'>' .$row->maincategory. '</option>';
            }
            $output .= '';
            echo $output;
        }
    }

    public function posted()
    {
        $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
        return view('users.postad', compact('categories'));
    }

    public function categories(Request $request, $maincategory, $id)
    {
        if ($id == 1)
        {
            $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $subcategories = DB::table('main_categories')
                        ->select('*')
                        ->join('sub_categories', 'sub_categories.maincategory_id', '=', 'main_categories.id')
                        ->where(['main_categories.id' => $id])
                        ->get();
            $states = States::all();
            return view('users.publishads.phone', compact('categories', 'subcategories', 'states'));
        }
        else if ($id == 2)
        {
            $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $subcategories = DB::table('main_categories')
                        ->select('*')
                        ->join('sub_categories', 'sub_categories.maincategory_id', '=', 'main_categories.id')
                        ->where(['main_categories.id' => $id])
                        ->get();
            $states = States::all();
            return view('users.publishads.cars', compact('categories', 'subcategories', 'states'));
        }
        else if ($id == 3)
        {
            $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $subcategories = DB::table('main_categories')
                        ->select('*')
                        ->join('sub_categories', 'sub_categories.maincategory_id', '=', 'main_categories.id')
                        ->where(['main_categories.id' => $id])
                        ->get();
            $states = States::all();
            return view('users.publishads.realestate', compact('categories', 'subcategories', 'states'));
        }
        else if ($id == 4)
        {
            $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $subcategories = DB::table('main_categories')
                        ->select('*')
                        ->join('sub_categories', 'sub_categories.maincategory_id', '=', 'main_categories.id')
                        ->where(['main_categories.id' => $id])
                        ->get();
            $states = States::all();
            return view('users.publishads.services', compact('categories', 'subcategories', 'states'));
        }
    }

    public function postcars(Request $request)
    {
        ///dd($request);
        $this->validate($request, [
            //'maincategory_id' => 'required',
            'subcategory_id' => 'required',
            'productName' => 'required',
            'yearsOfPurchase' => 'required',
            'expSellPrice' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'state' => 'required',
            'city' => 'required',
            //'photos' => 'required|file',
            //'photos' => 'required',
            //'photos.*' => 'image|mimes:jpg, png, jpeg, gif, svg|max:2048'
        ]);

        //dd($request);

        $ads = new Advertisement;
        $images = $request->file('photos');
        $count = 0;
        if ($request->file('photos'))
        {
            foreach ($images as $item)
            {
                if ($count < 4)
                {
                    $var = date_create();
                    $date = date_format($var, 'Ymd');
                    $imageName = $date . '-' . $item->getClientOriginalName();
                    $item->move(public_path() . '/uploads/', $imageName);
                    $url = URL::to("/") . '/uploads/' . $imageName;
                    $arr[] = $url;
                    $count++;
                }
            }
            $image = implode(",", $arr);
            $ads->maincategory_id = $request->input('maincategory_id');
            $ads->subcategory_id = $request->input('subcategory_id');
            $ads->productName = $request->input('productName');
            $ads->yearsOfPurchase = $request->input('yearsOfPurchase');
            $ads->expSellPrice = $request->input('expSellPrice');
            $ads->name = $request->input('name');
            $ads->mobile = $request->input('mobile');
            $ads->email = $request->input('email');
            $ads->state = $request->input('state');
            $ads->city = $request->input('city');
            $ads->photos = $image;
            $ads->save();
            return redirect('/')->with('info', 'Advertisement Published Successfully!');

            // $data = array(
            //     'maincategory_id' => $ads->maincategory_id,
            //     'subcategory_id' => $ads->subcategory_id,
            //     'productName' => $ads->productName,
            //     'yearsOfPurchase' => $ads->yearsOfPurchase,
            //     'expSellPrice' => $ads->expSellPrice,
            //     'name' => $ads->name,
            //     'mobile' => $ads->mobile,
            //     'email' => $ads->email,
            //     'state' => $ads->state,
            //     'city' => $ads->city,
            //     'photos' => $ads->photos,
            // );
            // echo $data;
        }

    }

    public function getAds()
    {
        $ads = DB::table('advertisements')->get();
        $output = '';
        if ($ads->count() > 0)
        {
            foreach ($ads as $row)
            {
                $output.= '<div class="col-md-3">
                    <div>
                    <img src='.strtok($row->photos, ',').' style="padding:10px
                    !important; width:100%; height:182px;"/>
                    <h3>'.$row->productName.'</h3>
                    <p>'.$row->expSellPrice.'</p>
                    <p>'.$row->city.'</p>

                    <a href='.$_SERVER['HTTP_REFERER'].'product/view/'.$row->id.'>VIEW</a>
                    </div>
                    </div>
                    ';
            }
            $output.='';
            echo $output;
        }
        else {
            $output.='<p><b>Not Found!</b></p>';
            echo $output;
        }
    }

    public function viewAds(Request $request, $maincategory, $id)
    {
        if ($id == 1)
        {
            $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $phones = DB::table('advertisements')
                        ->where(['maincategory_id' => $id])
                        ->get();
            return view('users.categories.phones', compact('categories', 'phones'));
        }
        else if ($id == 2)
        {
                        $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $cars = DB::table('advertisements')
                        ->where(['maincategory_id' => $id])
                        ->get();
            return view('users.categories.cars', compact('categories', 'cars'));
        }
        else if ($id == 3)
        {
                        $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $realestates = DB::table('advertisements')
                        ->where(['maincategory_id' => $id])
                        ->get();
            return view('users.categories.realestate', compact('categories', 'realestates'));
        }
        // else if ($id == 4)
        // {
        //     $categories = DB::table('main_categories')
        //                 ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
        //                 ->join('icons', 'icons.id', '=', 'main_categories.id')
        //                 ->get();
        //     $subcategories = DB::table('main_categories')
        //                 ->select('*')
        //                 ->join('sub_categories', 'sub_categories.maincategory_id', '=', 'main_categories.id')
        //                 ->where(['main_categories.id' => $id])
        //                 ->get();
        //     $states = States::all();
        //     return view('users.publishads.services', compact('categories', 'subcategories', 'states'));
        // }searchAdvertisements

    }

    public function searchProduct(Request $request)
    {
        if ($request->get('searchonproduct')) {
            $query = $request->get('searchonproduct');
            $categories = DB::table('main_categories')
                        ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                        ->join('icons', 'icons.id', '=', 'main_categories.id')
                        ->get();
            $datas = DB::table('advertisements')
                    ->where('productName', 'like', '%' .$query. '%')
                    ->get();
            return view('users.categories.searchonproduct', compact('categories', 'datas'));
        }
    }

    public function searchAdvertisements(Request $request)
    {
        if ($request->get('city') && $request->get('categories'))
        {
            $city = $request->get('city');
            $categories = $request->get('categories');
            $data = DB::table('advertisements')
                    ->where(['city' => $city, 'maincategory_id' => $categories])
                    ->get();
            $categories = DB::table('main_categories')
                    ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                    ->join('icons', 'icons.id', '=', 'main_categories.id')
                    ->get();
            return view('users.categories.searchoncategories', compact('categories', 'data'));
        }
    }

    public function viewProduct(Request $request, $id)
    {
        $categories = DB::table('main_categories')
                    ->select('main_categories.id', 'main_categories.maincategory', 'icons.icons')
                    ->join('icons', 'icons.id', '=', 'main_categories.id')
                    ->get();
        $product = DB::table('advertisements')
                    ->where(['id' => $id])
                    ->get();
            return view('users.productView', compact('categories', 'product'));
    }

}
