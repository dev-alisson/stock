<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

/**
 * Models
 */

use App\Models\Product;
use App\Models\Seller;
use App\Models\Log;

/**
 * ProductController
 */
class ProductController extends Controller
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
             * Products
             */
            $products = Product::all();

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
                'Acessou listagem de produtos'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/products/home',

                /**
                 * Data
                 */
                [
                    /**
                     * Products
                     */
                    'products' => $products
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
             * Sellers
             */
            $sellers = Seller::all();

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
                'Acessou formulário de cadastro de produtos'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/products/create',

                /**
                 * Data
                 */
                [
                    /**
                     * Sellers
                     */
                    'sellers' => $sellers
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
                    'name' => 'required|min:3',
                    'cover' => 'required',
                    'price' => 'required',
                    'stock' => 'required|integer',
                    'seller_id' => 'required|integer'
                ],

                /**
                 * Messages
                 */
                [
                    'name.required' => 'Informe o nome',
                    'name.min' => 'Nome muito curto',
                    'cover.required' => 'Envie uma capa',
                    'price.required' => 'Informe o preço',
                    'stock.required' => 'Informe o estoque',
                    'stock.integer' => 'Informe um estoque válido',
                    'seller_id.required' => 'Informe o vendedor',
                    'seller_id.integer' => 'Vendedor inválido'
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
             * Product
             */
            $product = new Product;

            /**
             * Data
             */
            $product->name = $request->name;
            $product->stock = $request->stock;
            $product->uri = Str::slug($request->name);
            $product->seller_id = $request->seller_id;
            $product->price = str_replace(',', '.', str_replace('.', '', $request->price));

            /**
             * Cover
             */
            if ($request->hasFile('cover')) {
                /**
                 * Name
                 */
                $coverRequest = $request->file('cover');
                $coverExtension = $coverRequest->extension();
                $coverName = time() . '.' . $coverExtension;

                /**
                 * Upload
                 */
                $coverRequest->move(public_path('uploads/products'), $coverName);

                /**
                 * Data
                 */
                $product->cover = "/uploads/products/{$coverName}";
            }

            /**
             * Save
             */
            $product->save();

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
                "Cadastrou produto ID :: {$product->id}"
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
                'message' => 'Produto cadastrado!',

                /**
                 * Redirect
                 */
                'redirect' => "/admin/products/edit/{$product->id}"
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
             * Product
             */
            $product = Product::find($id);

            /**
             * Sellers
             */
            $sellers = Seller::all();

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
                "Acessou o produto ID :: {$product->id}"
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/products/edit',

                /**
                 * Data
                 */
                [
                    /**
                     * Product
                     */
                    'product' => $product,

                    /**
                     * Sellers
                     */
                    'sellers' => $sellers
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
     * Update
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
                    'name' => 'required|min:3',
                    'price' => 'required',
                    'stock' => 'required|integer',
                    'seller_id' => 'required|integer'
                ],

                /**
                 * Messages
                 */
                [
                    'name.required' => 'Informe o nome',
                    'name.min' => 'Nome muito curto',
                    'price.required' => 'Informe o preço',
                    'stock.required' => 'Informe o estoque',
                    'stock.integer' => 'Informe um estoque válido',
                    'seller_id.required' => 'Informe o vendedor',
                    'seller_id.integer' => 'Vendedor inválido'
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
             * Product
             */
            $product = Product::find($id);

            /**
             * Data
             */
            $product->name = $request->name;
            $product->stock = $request->stock;
            $product->uri = Str::slug($request->name);
            $product->seller_id = $request->seller_id;
            $product->price = str_replace(',', '.', str_replace('.', '', $request->price));

            /**
             * Cover
             */
            if ($request->hasFile('cover')) {
                /**
                 * Old
                 */
                if ($product->cover) {
                    /**
                     * Path
                     */
                    $path = public_path($product->cover);

                    /**
                     * Exists
                     */
                    if (file_exists($path)) {
                        /**
                         * Remove
                         */
                        unlink($path);
                    }
                }

                /**
                 * Name
                 */
                $coverRequest = $request->file('cover');
                $coverExtension = $coverRequest->extension();
                $coverName = time() . '.' . $coverExtension;

                /**
                 * Upload
                 */
                $coverRequest->move(
                    /**
                     * Path
                     */
                    public_path('uploads/products'),

                    /**
                     * Name
                     */
                    $coverName
                );

                /**
                 * Data
                 */
                $product->cover = "/uploads/products/{$coverName}";
            }

            /**
             * Save
             */
            $product->save();

            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->warning(
                /**
                 * Action
                 */
                'Atualização',

                /**
                 * Message
                 */
                "Atualizou o produto ID :: {$product->id}"
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
                'message' => 'Produto atualizado!'
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
             * Product
             */
            $product = Product::find($id);

            /**
             * Delete
             */
            $product->delete();

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
                "Removeu o produto ID :: {$product->id}"
            );

            /**
             * Triggers
             */
            return [
                /**
                 * Message
                 */
                'message' => 'Produto removido com sucesso!'
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
