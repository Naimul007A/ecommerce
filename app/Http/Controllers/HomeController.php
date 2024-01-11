<?php

    namespace App\Http\Controllers;

    use App\Models\Order;
    use App\Models\OrderItem;
    use App\Models\Product;
    use Illuminate\Support\Facades\Auth;

    class HomeController extends Controller {
        public function index (): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application {
            return view ( 'welcome' );
        }

        public function profile (  ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application {
            $orders = OrderItem::whereHas('order', function ($query) {
                $query->where('user_id', 2);
            })->get();
            return view ("profile",compact ("orders"));
        }

        public function logout (  ): \Illuminate\Http\RedirectResponse {
            Auth::logout ();
            flash ()->addSuccess ("Logout Successfully.");
            return redirect ()->route ("home");
        }

        public function login (  ): \Illuminate\Http\RedirectResponse {
            flash ()->addSuccess ("Logout Successfully.");
            return redirect ()->route ("home");
        }
    }
