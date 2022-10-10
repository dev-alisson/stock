<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

/**
 * Models
 */

use App\Models\Order;
use App\Models\Item;
use App\Models\Product;
use App\Models\User;
use App\Models\Log;

/**
 * OrderController
 */
class OrderController extends Controller
{
    /**
     * Index
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
                'Acessou listagem de pedidos'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/orders/home',

                /**
                 * Data
                 */
                [
                    /**
                     * Users
                     */
                    'orders' => $orders
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
     * Create
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Try
         */
        try {
            /**
             * Products
             */
            $products = Product::all();

            /**
             * Users
             */
            $users = User::all();

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
                'Acessou formulário de cadastro de pedidos'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/orders/create',

                /**
                 * Data
                 */
                [
                    /**
                     * Products
                     */
                    'products' => $products,

                    /**
                     * Users
                     */
                    'users' => $users
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
     * Store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Try
         */
        try {
            /**
             * Validate
             */
            $validator = Validator::make(
                /**
                 * Data
                 */
                $request->all(),

                /**
                 * Rules
                 */
                [
                    'user_id' => 'required|integer',
                    'products' => 'required|array'
                ],

                /**
                 * Messages
                 */
                [
                    'user_id.required' => 'Selecione o cliente',
                    'user_id.integer' => 'Cliente inválido',
                    'products.required' => 'Selecione os produtos',
                    'products.array' => 'Lista de produtos inválida'
                ]
            );

            /**
             * Verify
             */
            if ($validator->fails()) {
                /**
                 * Response
                 */
                return [
                    /**
                     * Error
                     */
                    'error' => true,

                    /**
                     * Message
                     */
                    'message' => $validator->errors()->first()
                ];
            }

            /**
             * Order
             */
            $order = new Order;

            /**
             * Data
             */
            $order->total = 0;
            $order->user_id = $request->user_id;

            /**
             * Total
             */
            foreach ($request->products as $id) {
                /**
                 * Product
                 */
                $product = Product::find($id);

                /**
                 * Data
                 */
                $order->total += $product->price;
            }

            /**
             * Save
             */
            $order->save();

            /**
             * Products
             */
            foreach ($request->products as $id) {
                /**
                 * Product
                 */
                $product = Product::find($id);

                /**
                 * Item
                 */
                $item = new Item;

                /**
                 * Data
                 */
                $item->amount = 1;
                $item->order_id = $order->id;
                $item->price = $product->price;
                $item->product_id = $product->id;

                /**
                 * Save
                 */
                $item->save();

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
                    'Cadastro',

                    /**
                     * Message
                     */
                    "Cadastrou item ID :: {$item->id} do pedido ID :: {$order->id}"
                );
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
                'Cadastro',

                /**
                 * Message
                 */
                "Cadastrou pedido ID :: {$order->id}"
            );

            /**
             * Response
             */
            return [
                /**
                 * Error
                 */
                'error' => false,

                /**
                 * Message
                 */
                'message' => 'Pedido cadastrado!',

                /**
                 * Redirect
                 */
                'redirect' => "/admin/orders/edit/{$order->id}"
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

    /**
     * Edit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * Try
         */
        try {
            /**
             * Order
             */
            $order = Order::find($id);

            /**
             * User
             */
            $user = $order->user();

            /**
             * Items
             */
            $items = $order->items();

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
                "Acessou o pedido ID :: {$order->id}"
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/orders/edit',

                /**
                 * Data
                 */
                [
                    /**
                     * Order
                     */
                    'order' => $order,

                    /**
                     * User
                     */
                    'user' => $user,

                    /**
                     * Items
                     */
                    'items' => $items,
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
     * Destroy
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * Try
         */
        try {
            /**
             * Order
             */
            $order = Order::find($id);

            /**
             * Delete
             */
            $order->delete();

            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->danger(
                /**
                 * Action
                 */
                'Remoção',

                /**
                 * Message
                 */
                "Removeu o pedido ID :: {$id}"
            );

            /**
             * Triggers
             */
            return [
                /**
                 * Message
                 */
                'message' => 'Pedido removido!'
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
