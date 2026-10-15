<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Admob;
use App\Models\Category;
use App\Models\GlobalSettings;
use App\Models\SubscriptionPackage;
use App\Models\Wallpaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    function index()
    {
        $allCategories = Category::count();
        $category = Category::where('type', '0')->count();
        $liveCategory = Category::where('type', '1')->count();
        $allWallpapers = Wallpaper::count();
        $wallpapers = Wallpaper::where('wallpaper_type', '0')->count();
        $liveWallpapers = Wallpaper::where('wallpaper_type', '1')->count();
        $freeWallpapers = Wallpaper::where('access_type', '0')->count();
        $premiumWallpapers = Wallpaper::where('access_type', '1')->count();
        $recentWallpapers = Wallpaper::with('category')->orderBy('id', 'DESC')->limit(6)->get();
        $recentCategories = Category::withCount('wallpapers')->orderBy('id', 'DESC')->limit(5)->get();

        return view('index', [
            'allCategories' => $allCategories, 
            'category' => $category, 
            'liveCategory' => $liveCategory, 
            'allWallpapers' => $allWallpapers, 
            'wallpapers' => $wallpapers, 
            'liveWallpapers' => $liveWallpapers, 
            'freeWallpapers' => $freeWallpapers,
            'premiumWallpapers' => $premiumWallpapers,
            'recentWallpapers' => $recentWallpapers,
            'recentCategories' => $recentCategories,
        ]);
    }

    public function setting()
    {
        $setting = GlobalSettings::first();
        return view('setting', [
            'setting' => $setting
        ]);
    }

    public function fetchSettings()
    {
        $data = GlobalSettings::first();
        $categories = Category::orderBy('id', 'DESC')->withCount('wallpapers')->get();
        $admob = Admob::get();
        $subscriptionPackages = SubscriptionPackage::get();

        return response()->json([
            'status' => true,
            'message' => 'Fetch Setting Successfully',
            'data' => $data,
            'categories' => $categories,
            'admob' => $admob,
            'subscriptionPackages' => $subscriptionPackages,
        ]);
    }

    public function fetchHomePageData()
    {
        $featuredWallpapers = Wallpaper::where('is_featured', 1)->get();
        $latestWallpapers = Wallpaper::orderBy('created_at', 'desc')->take(50)->get();

        return response()->json([
            'status' => true,
            'message' => 'Fetch Featured and Latest Wallpapers Successfully',
            'featured_wallpapers' => $featuredWallpapers,
            'latest_wallpapers' => $latestWallpapers,
        ]);
    }

    public function fetchLikedWallpaper(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'wallpaper_ids' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }

        $wallpaper_ids = explode(',', $request->wallpaper_ids);

        $fetchLikedWallpapers = Wallpaper::whereIn('id', $wallpaper_ids)->get();
        
        return response()->json([
            'status' => true,
            'message' => 'Fetch Liked Wallpapers Successfully',
            'data' => $fetchLikedWallpapers,
        ]);
    }

    public function saveSettings(Request $request)
    {
        $setting = GlobalSettings::first();

        if ($setting == null) {
            return response()->json([
                'status' => false,
                'message' => 'setting Not Found',
            ]);
        } 
        if ($request->has('app_name')) {
            $setting->app_name = $request->app_name;
            $request->session()->put('app_name', $setting['app_name']);
        }
        if ($request->has('currency')) {
            $setting->currency = $request->currency;
            $request->session()->put('currency', $setting['currency']);
        }
        $setting->save();
            
        return response()->json([
            'status' => true,
            'message' => 'Setting Updated Successfully',
        ]);

    }

    public function changePassword(Request $request)
    {
        $admin = Admin::where('user_type', 1)->first();
        if ($admin) {
            if ($request->has('user_password')) {
                if ($admin->user_password == $request->user_password) {
                    $admin->user_password = $request->new_password;
                    $admin->save();
                    return response()->json([
                        'status' => true,
                        'message' => 'Change Password',
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Old Password does not match',
                    ]);
                }
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Admin not found',
            ]);
        }
    }

    public function subscription()
    {
        $monthlySubscription = SubscriptionPackage::where('package_id', 1)->first();
        $yearlySubscription = SubscriptionPackage::where('package_id', 2)->first();
        return view('subscription', [
            'monthlySubscription' => $monthlySubscription,
            'yearlySubscription' => $yearlySubscription,
        ]);
    }

    public function monthlySubscription(Request $request)
    {
        $monthlySubscription = SubscriptionPackage::where('package_id', $request->package_id)->first();

        if ($monthlySubscription == null) {
            return response()->json([
                'status' => false,
                'message' => 'Subscription Not Found',
            ]);
        }

        $monthlySubscription->android_product_id = $request->android_product_id; 
        $monthlySubscription->ios_product_id = $request->ios_product_id; 
        $monthlySubscription->save();
            
        return response()->json([
            'status' => true,
            'message' => 'Subscription Updated Successfully',
        ]);

    }

    public function yearlySubscription(Request $request)
    {
        $yearlySubscriptionForm = SubscriptionPackage::where('package_id', $request->package_id)->first();

        if ($yearlySubscriptionForm == null) {
            return response()->json([
                'status' => false,
                'message' => 'Subscription Not Found',
            ]);
        }
        
        $yearlySubscriptionForm->android_product_id = $request->android_product_id; 
        $yearlySubscriptionForm->ios_product_id = $request->ios_product_id; 
        $yearlySubscriptionForm->save();
            
        return response()->json([
            'status' => true,
            'message' => 'Subscription Updated Successfully',
        ]);

    }

    function admob()
    {
        $admobAndroid = Admob::where('type', 1)->first();
        $admobiOS = Admob::where('type', 2)->first();
        return view('admob', [
            'admobAndroid' => $admobAndroid,
            'admobiOS' => $admobiOS,
        ]);
    }

    public function admobAndroid(Request $request)
    {
        $admobAndroid = Admob::where('type', $request->type)->first();

        if ($admobAndroid == null) {
            return response()->json([
                'status' => false,
                'message' => 'Subscription Not Found',
            ]);
        } 
        
        $admobAndroid->banner_id = $request->banner_id; 
        $admobAndroid->intersial_id = $request->intersial_id; 
        $admobAndroid->rewarded_id = $request->rewarded_id; 
        $admobAndroid->save();
            
        return response()->json([
            'status' => true,
            'message' => 'Admob Updated Successfully',
        ]);

    }

    public function admobiOS(Request $request)
    {
        $admobAndroid = Admob::where('type', $request->type)->first();

        if ($admobAndroid == null) {
            return response()->json([
                'status' => false,
                'message' => 'Subscription Not Found',
            ]);
        } 
        
      
        $admobAndroid->banner_id = $request->banner_id; 
        $admobAndroid->intersial_id = $request->intersial_id; 
        $admobAndroid->rewarded_id = $request->rewarded_id; 
        $admobAndroid->save();
            
        return response()->json([
            'status' => true,
            'message' => 'Admob Updated Successfully',
        ]);

    }

   
    // API

    public function fetchAllData(Request $request)
    {
        $categories = Category::get();
        $wallpapers = Wallpaper::get();
        $subscriptionPackages = SubscriptionPackage::get();
        $admob = Admob::get();

        return response()->json([
            'status' => true,
            'message' => 'Fetch home page data successfully',
            'wallpapers' => $wallpapers, 
            'categories' => $categories,
            'subscriptionPackages' => $subscriptionPackages, 
            'admob' => $admob, 
        ]);
    }

    public function fetchWallpaperByCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'start' => 'required',
            'limit' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }

        $category = Category::where('id', $request->category_id)->first();
        if ($category == null) {
            return response()->json([
                'status' => false,
                'message' => 'Category Not Found',
            ]);
        }

        $wallpapers = Wallpaper::where('category_id', $request->category_id)
                                ->orderBy('id', 'DESC')
                                ->offset($request->start)
                                ->limit($request->limit)
                                ->get();

        return response()->json([
            'status' => true,
            'message' => 'Fetch wallpaper by category',
            'data' => $wallpapers
        ]);
    }

    public function searchWallpaper(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start' => 'required',
            'limit' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['status' => false, 'message' => $msg]);
        }

        $result = Wallpaper::query();

        if ($request->has('access_type')) {
            $result->where('access_type', $request->access_type);
        }
        if($request->has('tags')) {
           $result->where('tags', 'like', '%' . $request->tags . '%');
        }



        $result->offset($request->start)->limit($request->limit);

        $resultsWallpapers = $result->get();

        return response()->json([
            'status' => true,
            'message' => 'Search result successfully',
            'data' => $resultsWallpapers
        ]);

    }


 
}