<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Comment;
use App\Models\Location;
use App\Models\Place;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Cuisin;
use App\Models\Highlight;

class PlaceController extends Controller
{

    /**
     * Get all restaurants for given city
     *
     * @return array
     */
    public function index(){
        $city = request('city');

        $restaurants = $this->getRestaurants($city);
        $chunked = collect($restaurants)->values()->chunk(10)->toArray();

        $result['restaurants'] = $chunked[0];
        $result['city'] = $city;
        $result['filters'] = $this->getFilters();

        return $result;
    }

    public function loadMore($data){
        $d = json_decode($data, true);
        $city = $d['city'];
        $page = $d['page'];
        $filters = array();
        $filters['categories'] = array_key_exists('Mode', $d['filters']) ? $d['filters']['Mode'] : [];
        $filters['costs'] = array_key_exists('Cost', $d['filters']) ? $d['filters']['Cost'] : [];
        $filters['highlights'] = array_key_exists('Sort By', $d['filters']) ? $d['filters']['Sort By'] : [];
        $filters['cuisines'] = array_key_exists('Cuisine', $d['filters']) ? $d['filters']['Cuisine'] : [];
        $filters['types'] = array_key_exists('Type', $d['filters']) ? $d['filters']['Type'] : [];
        $filters['locations'] = array_key_exists('Location', $d['filters']) ? $d['filters']['Location'] : [];

        if(count($filters['categories']) > 0 || count($filters['costs']) > 0 || count($filters['highlights']) > 0 || count($filters['cuisines']) > 0 || count($filters['types']) > 0 || count($filters['locations']) > 0) {

            $restaurants = $this->getRestaurants($city, $filters);
        }
        else{
            $restaurants = $this->getRestaurants($city);
        }

        $chunked = collect($restaurants)->values()->chunk(10)->toArray();

        $result['restaurants'] = $chunked[$page-1];

        if($page == count($chunked)){
            $result['status'] = 'ended';
        }

        return $result;

    }

    public function filter($data){

        $d = json_decode($data, true);
        $page = $d['page'];
        $city = $d['city'];

        $filters = array();
        $filters['categories'] = array_key_exists('Mode', $d['filters']) ? $d['filters']['Mode'] : [];
        $filters['costs'] = array_key_exists('Cost', $d['filters']) ? $d['filters']['Cost'] : [];
        $filters['highlights'] = array_key_exists('Sort By', $d['filters']) ? $d['filters']['Sort By'] : [];
        $filters['cuisines'] = array_key_exists('Cuisine', $d['filters']) ? $d['filters']['Cuisine'] : [];
        $filters['types'] = array_key_exists('Type', $d['filters']) ? $d['filters']['Type'] : [];
        $filters['locations'] = array_key_exists('Location', $d['filters']) ? $d['filters']['Location'] : [];

        $restaurants = $this->getRestaurants($city, $filters);

        if(count($restaurants) > 0) {
            $chunked = collect($restaurants)->values()->chunk(10)->toArray();
            $response['restaurants'] = $chunked[0];
            if($page == count($chunked)){
                $response['status'] = 'ended';
            }
        }
        else{
            $response = [];
        }



        return $response;

    }


    /**
     * Get filtered data
     *
     * @return array
     */
    public function getRestaurants($city, $filters = null){

        //get filter data
        if($filters) {
            $categories = $filters['categories'];
            $costs = $filters['costs'];
            $highlights = $filters['highlights'];
            $cuisines = $filters['cuisines'];
            $types = $filters['types'];
            $locations = $filters['locations'];
        }
        else{
            $categories = [];
            $costs = [];
            $highlights = [];
            $cuisines = [];
            $types = [];
            $locations = [];
        }



        $data = Place::with([
            'categories' => function($query) use($categories) {
                if(count($categories) > 0)
                    return $query->whereIn('category_id', $categories);
            },
            'highlights' => function($query) use ($highlights){
                if(count($highlights) > 0)
                    return $query->whereIn('highlight_id', $highlights);
            },
            'cuisins' => function($query) use ($cuisines){
                if(count($cuisines) > 0)
                    return $query->whereIn('cuisin_id', $cuisines);
            },
            'types' => function($query) use ($types){
                if(count($types) > 0)
                    return $query->whereIn('type_id', $types);
            },
            'location' => function($query) use ($city){
                $query->with(['city' => function($query1) use ($city){
                    return $query1->where('name', $city);
                }]);
            },
            'thumb_image'
        ]);

        if(count($locations) > 0)
            $data = $data->whereIn('location_id', $locations);

        if(count($costs) > 0)
            $data = $data->whereIn('cost', $costs);

        $places = $data->get()->toArray();

        $places = collect($places)->filter(function($value, $key){
            return !is_null($value['location']['city']);
        })->values()->all();

        if(count($categories) > 0)
            $places = collect($places)->filter(function($value, $key){
                return count($value['categories']) > 0;
            })->values()->all();

        if(count($highlights) > 0)
            $places = collect($places)->filter(function($value, $key){
                return count($value['highlights']) > 0;
            })->values()->all();

        if(count($cuisines) > 0)
            $places = collect($places)->filter(function($value, $key){
                return count($value['cuisins']) > 0;
            })->values()->all();

        if(count($types) > 0)
            $places = collect($places)->filter(function($value, $key){
                return count($value['types']) > 0;
            })->values()->all();


        //format data
        $restaurants = array();
        foreach ($places as $item){
            $place = array();
            $rate = $this->avg_rate($item['id']);
            $place['rating'] = $rate;
            $place['id'] = $item['id'];
            $place['title'] = $item['name'];
            $place['explane'] = $item['intro'];
            $place['address'] = $item['address'];
            $place['lat'] = $item['lat'];
            $place['long'] = $item['lon'];

            if(count($item['thumb_image']) > 0)
                $place['image'] = $item['thumb_image'][0]['name'];
            else
                $place['image'] = null;

            $hs = array();
            foreach ($item['highlights'] as $key => $highlight){
                array_push($hs, $highlight['name']);
            }
            $place['service'] = $hs;

            array_push($restaurants, $place);
        }

        return $restaurants;
    }

    /**
     * Get all filters
     *
     * @return array
     */
    public function getFilters(){
        $data = [];
        $data['Mode'] = Category::select('id', 'name')->get()->toArray();
        $data['Sort By'] = Highlight::select('id', 'name')->get()->toArray();
        $data['Cuisine'] = Cuisin::select('id', 'name')->get()->toArray();
        $data['Type Of Restaurants'] = Type::select('id', 'name')->get()->toArray();

        $city = City::where('name', request('city'))->first();
        $data['Location'] = Location::where('city_id', $city->id)->select('id', 'name')->get()->toArray();
        return $data;

    }

    /**
     * Get average rate for current place
     *
     * @param $place_id
     * @return float|int
     */
    public function avg_rate($place_id){
        $rates = DB::table('rates')->where('place_id', $place_id)->select('mark')->get();
        $sum = 0;
        foreach ($rates as $rate){
            $sum = $sum + $rate->mark;
        }
        if(count($rates) > 0)
            return $sum/count($rates);
        else
            return 0;
    }

    /**
     * Show current restaurants
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id){

        $place = Place::with([
            'highlights',
            'images',
            'rates',
            'workinghour',
            'cuisins',
            'highlights',
            'types',
            'shares' => function($share){
                return $share->with('image');
            },
            'comments' => function($comments){
                return $comments->orderBy('created_at', 'desc');
            },
            'menus' => function($menu){
                return $menu->with('products');
            }
        ])
            ->findOrFail($id);

        // get avg rate for current place and push to array
        $collection = collect($place->toArray());
        collect($place->toArray())->each(function($item, $key) use($collection){
            if($key == 'rates'){
                $total_rate = 0;
                $count = count($item);
                foreach ($item as $rate){
                    $total_rate += $rate['mark'];
                }
                if($count != 0 )
                    $m_rate = round($total_rate/$count);
                else
                    $m_rate = 0;

                $collection->prepend($m_rate, 'rating');
            }
        })->all();

        // get total comments count for current place and add to array
        $collection->prepend(count($collection['comments']), 'comment');

        // format price and add to array
        switch ($place->cost){
            case 0:
                $collection->prepend('', 'price');
                break;
            case 1:
                $collection->prepend('$', 'price');
                break;
            case 2:
                $collection->prepend('$$', 'price');
                break;
            case 3:
                $collection->prepend('$$$', 'price');
                break;
            case 4:
                $collection->prepend('$$$$', 'price');
                break;
        }

        $wrk_hs_array = $place->workinghour->toArray();

        $workinghours = array();

        $workinghours['mon'] = $wrk_hs_array['mon'];
        $workinghours['tue'] = $wrk_hs_array['tue'];
        $workinghours['wed'] = $wrk_hs_array['wed'];
        $workinghours['thu'] = $wrk_hs_array['thu'];
        $workinghours['fri'] = $wrk_hs_array['fri'];
        $workinghours['sat'] = $wrk_hs_array['sat'];
        $workinghours['sun'] = $wrk_hs_array['sun'];


        $collection->prepend($workinghours, 'workingHours');

        // format shares, comments
        $array = $collection->all();

        //get comments author
        $comments = $array['comments'];
        foreach($comments as $key => $comment){
            $comments[$key]['author'] = $comment['commentable_type'] :: find($comment['commentable_id'])->toArray();
            $sub_comments = Comment::where('parent_id', $comment['id'])->orderBy('created_at', 'asc')->get()->toArray();


            foreach ($sub_comments as $k=>$sub_comment){
                $sub_comments[$k]['author'] = $sub_comment['commentable_type'] :: find($sub_comment['commentable_id'])->toArray();
            }
            $comments[$key]['sub_comments'] = $sub_comments;
        }


        $chunked = collect($comments)->values()->chunk(5)->toArray();
        $comm_pages = count($chunked);
        $array['comments'] = $chunked[0];

        $data = array();

        foreach ($array as $key=>$value){

//            // share format
//            if($key == 'shares'){
//                foreach ($array[$key] as $k=>$v){
//
//                    $data[$key][$k]['photo'] =  $v['image']['name'];
//
//                    $from = date_create($v['wrk_hrs_from']);
//                    $formatted_from = date_format($from, "H:i");
//
//                    $to = date_create($v['wrk_hrs_to']);
//                    $formatted_to = date_format($to, "H:i");
//                    $data[$key][$k]['workingHours'] =  'Working hours: '.$formatted_from.'- '.$formatted_to;
//                    $data[$key][$k]['title'] = $v['title'];
//                    $data[$key][$k]['content'] = $v['content'];
//                    $data[$key][$k]['location'] = $v['location'];
//                }
//            }

//            comments format
            if($key == 'comments'){
                foreach ($array[$key] as $k=>$v){
//                    if(count(($v['user']['rates'])) > 0) {
//                        $data[$key][$k]['rate'] = $v['user']['rates'][0]['mark'];
//                    }
//                    else{
//                        $data[$key][$k]['rate'] = 0;
//                    }

                    $data[$key][$k]['name'] = $v['author']['name'];
                    $data[$key][$k]['date'] = date_format(date_create($array[$key][$k]['created_at']), "m/d/y");
                    $data[$key][$k]['comment'] = $v['text'];
                    $data[$key][$k]['id'] = $v['id'];

                    $sub_coms = Comment::where('parent_id', $v['id'])->get()->toArray();
                    if(count($sub_coms) > 0) {
                        foreach ($sub_coms as $index => $comment) {
                            $author = $comment['commentable_type']:: find($comment['commentable_id'])->name;
                            $data[$key][$k]['subComment'][$index]['name'] = $author;
                            $data[$key][$k]['subComment'][$index]['comment'] = $comment['text'];
                            $data[$key][$k]['subComment'][$index]['date'] = date_format(date_create($comment['created_at']), "m/d/y");
                            $data[$key][$k]['subComment'][$index]['id'] = $comment['id'];
                        }
                    }
                    else{
                        $data[$key][$k]['subComment'] = null;
                    }
                }
            }

            // cuisins format
            if($key == 'cuisins'){
                $cuisins = array();
                foreach ($array[$key] as $k=>$v){
                    array_push($cuisins, $v['name']);
                }
                $data['cuisins'] = $cuisins;
            }

            // services format
            if($key == 'highlights'){
                $services = array();
                foreach ($array[$key] as $k=>$v){
                    array_push($services, $v['name']);
                }
                $data['services'] = $services;
            }

            //types format
            if($key == 'types'){
                $types = array();
                foreach ($array[$key] as $k=>$v){
                    array_push($types, $v['name']);
                }
                $data['types'] = $types;
            }

            // images format
            if($key == 'images'){
                $images = array();
                foreach ($array[$key] as $k => $v){
                    array_push($images, '../images/restaurantImages/'.$v['name']);
                }
                $data['images'] = $images;
            }

            // menus format
            if($key == 'menus'){
                foreach ($array[$key] as $k=>$v){
                    $data['menuItems'][$k]['name'] = $v['name'];
                    $data['menuItems'][$k]['id'] = $v['id'];
                }
            }
        }

        $data['id'] = $array['id'];
        $data['mobileNumber'] = $array['mobile'];
        $data['name'] = $array['name'];
        $data['rating'] = (int)$array['rating'];
        $data['comment'] = $array['comment'];
        if($comm_pages == 1)
            $data['more_comments'] = false;
        else
            $data['more_comments'] = true;
        $data['intro'] = $array['intro'];
        $data['address'] = $array['address'];
        $data['lat'] = $array['lat'];
        $data['long'] = $array['lon'];
        $data['site'] = $array['site'];
        $data['price'] = $array['price'];
        $data['workingHours'] = $array['workingHours'];

        // $data['shareItems'] = $data['shares'];

        return response()->json($data);
    }

    /**
     * get more comments
     *
     * @return mixed
     */
    public function moreComments(){
        $place_id = request('place_id');
        $page = request('page');

        $place = Place::with(['comments' => function($comments){
            return $comments->orderBy('created_at', 'desc');
        }])
        ->findOrFail($place_id);

        $collection = collect($place->toArray());

        $array = $collection->all();

        //get comments author
        $comments = $array['comments'];
        foreach($comments as $key => $comment){
            $comments[$key]['author'] = $comment['commentable_type'] :: find($comment['commentable_id'])->toArray();
            $sub_comments = Comment::where('parent_id', $comment['id'])->orderBy('created_at', 'asc')->get()->toArray();


            foreach ($sub_comments as $k=>$sub_comment){
                $sub_comments[$k]['author'] = $sub_comment['commentable_type'] :: find($sub_comment['commentable_id'])->toArray();
            }
            $comments[$key]['sub_comments'] = $sub_comments;
        }
        $chunked = collect($comments)->values()->chunk(5)->toArray();
        $pages = count($chunked);
        $array['comments'] = $chunked[$page-1];

        $response = array();
        $comms = array();
        foreach ($array['comments'] as $k=>$v){

            $comms[$k]['name'] = $v['author']['name'];
            $comms[$k]['date'] = date_format(date_create($v['created_at']), "m/d/y");
            $comms[$k]['comment'] = $v['text'];
            $comms[$k]['id'] = $v['id'];

            $sub_coms = Comment::where('parent_id', $v['id'])->get()->toArray();
            if(count($sub_coms) > 0) {
                foreach ($sub_coms as $index => $comment) {
                    $author = $comment['commentable_type']:: find($comment['commentable_id'])->name;
                    $comms[$k]['subComment'][$index]['name'] = $author;
                    $comms[$k]['subComment'][$index]['comment'] = $comment['text'];
                    $comms[$k]['subComment'][$index]['date'] = date_format(date_create($comment['created_at']), "m/d/y");
                    $comms[$k]['subComment'][$index]['id'] = $comment['id'];
                }
            }
            else{
                $comms[$k]['subComment'] = null;
            }
        }

        $response['comments'] = $comms;
        if($page == $pages)
            $response['more_data'] = false;
        else
            $response['more_data'] = true;
        return $response;
    }
    /**
     * get products for given menu
     * @param $menu_id
     * @return mixed
     */
    public function products($menu_id){
        $products = Product::where('menu_id', $menu_id)->select(['title', 'description', 'price'])->get()->toArray();
        return $products;
    }


}
