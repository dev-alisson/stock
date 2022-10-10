<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Models
 */

use App\Models\Order;
use App\Models\User;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Log;

/**
 * HomeController
 */
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Try
         */
        try {
            /**
             * Orders
             */
            $orders = Order::all();

            /**
             * Users
             */
            $totalUsers = User::count();

            /**
             * Sellers
             */
            $totalSellers = Seller::count();

            /**
             * Products
             */
            $totalProducts = Product::count();

            /**
             * Revenues
             */
            $revenues = Order::sum('total');

            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->info(
                /**
                 * Action
                 */
                'Acesso',

                /**
                 * Message
                 */
                'Acessou a dashboard'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/home/home',

                /**
                 * Data
                 */
                [
                    /**
                     * Orders
                     */
                    'orders' => $orders,

                    /**
                     * Users
                     */
                    'totalUsers' => $totalUsers,

                    /**
                     * Sellers
                     */
                    'totalSellers' => $totalSellers,

                    /**
                     * Products
                     */
                    'totalProducts' => $totalProducts,

                    /**
                     * Revenues
                     */
                    'revenues' => $revenues
                ]
            );
        } catch (\Exception $error) {
            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->critical(
                /**
                 * Action
                 */
                'Erro',

                /**
                 * Message
                 */
                $error->getMessage()
            );
        }
    }

    /**
     * Sales
     * @return \Illuminate\Http\Response
     */
    public function sales()
    {
        /**
         * Try
         */
        try {
            /**
             * Data
             */
            $names = [];
            $sales = [];
            $revenues = [];

            /**
             * Sellers
             */
            $sellers = DB::table('sellers')
                ->select(
                    DB::raw('
                        name,

                        (
                            SELECT
                                COUNT(*)
                            FROM
                                products p
                            INNER JOIN
                                items i
                            ON
                                i.product_id = p.id
                            WHERE
                                p.seller_id = sellers.id
                        ) AS sales,

                        (
                            SELECT
                                SUM(i.price)
                            FROM
                                products p
                            INNER JOIN
                                items i
                            ON
                                i.product_id = p.id
                            WHERE
                                p.seller_id = sellers.id
                        ) AS revenue
                    ')
                )
                ->orderBy('revenue', 'desc')
                ->limit(5)
                ->get();

            /**
             * Data
             */
            foreach ($sellers as $seller) {
                /**
                 * Names
                 */
                $names[] = $seller->name;

                /**
                 * Sales
                 */
                $sales[] = $seller->sales;

                /**
                 * Revenues
                 */
                $revenues[] = $seller->revenue;
            }

            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->info(
                /**
                 * Action
                 */
                'Acesso',

                /**
                 * Message
                 */
                'Buscou os dados do relatório de vendas da dashboard'
            );

            /**
             * Data
             */
            return [
                /**
                 * Sellers
                 */
                'sellers' => $names,

                /**
                 * Sales
                 */
                'sales' => $sales,

                /**
                 * Revenues
                 */
                'revenues' => $revenues
            ];
        } catch (\Exception $error) {
            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->critical(
                /**
                 * Action
                 */
                'Erro',

                /**
                 * Message
                 */
                $error->getMessage()
            );
        }
    }
}
