<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

/**
 * Models
 */

use App\Models\Seller;
use App\Models\Log;

/**
 * SellerController
 */
class SellerController extends Controller
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
                'Acessou listagem de vendedores'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/sellers/home',

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
                'Acessou formulário de cadastro de vendedores'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/sellers/create'
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
                    'document' => 'required|min:14|max:18',
                    'email' => 'required|email|unique:sellers',
                    'phone' => 'required|unique:sellers'
                ],

                /**
                 * Messages
                 */
                [
                    'name.required' => 'Informe o nome',
                    'name.min' => 'Nome muito curto',
                    'cover.required' => 'Envie uma foto',
                    'document.required' => 'Informe o CNPJ',
                    'document.min' => 'Informe um CNPJ válido',
                    'document.max' => 'Informe um CNPJ válido',
                    'email.required' => 'Informe o e-mail',
                    'email.email' => 'Informe um e-mail válido',
                    'email.unique' => 'E-mail já cadastrado',
                    'phone.required' => 'Informe o telefone',
                    'phone.unique' => 'Telefone já cadastrado'
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
             * Seller
             */
            $seller = new Seller;

            /**
             * Data
             */
            $seller->name = $request->name;
            $seller->email = $request->email;
            $seller->phone = $request->phone;
            $seller->document = $request->document;

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
                $coverRequest->move(public_path('uploads/sellers'), $coverName);

                /**
                 * Data
                 */
                $seller->cover = "/uploads/sellers/{$coverName}";
            }

            /**
             * Save
             */
            $seller->save();

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
                "Cadastrou vendedor ID :: {$seller->id}"
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
                'message' => 'Vendedor cadastrado!',

                /**
                 * Redirect
                 */
                'redirect' => "/admin/sellers/edit/{$seller->id}"
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
             * Seller
             */
            $seller = Seller::find($id);

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
                "Acessou o vendedor ID :: {$seller->id}"
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/sellers/edit',

                /**
                 * Data
                 */
                [
                    /**
                     * Seller
                     */
                    'seller' => $seller
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
             * Seller
             */
            $seller = Seller::find($id);

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
                    'document' => 'required|min:14|max:18',
                    'email' => ['required', 'email', Rule::unique('sellers')->ignore($seller->id)],
                    'phone' => ['required', Rule::unique('sellers')->ignore($seller->id)]
                ],

                /**
                 * Messages
                 */
                [
                    'name.required' => 'Informe o nome',
                    'name.min' => 'Nome muito curto',
                    'document.required' => 'Informe o CNPJ',
                    'document.min' => 'Informe um CNPJ válido',
                    'document.max' => 'Informe um CNPJ válido',
                    'email.required' => 'Informe o e-mail',
                    'email.email' => 'Informe um e-mail válido',
                    'email.unique' => 'E-mail já cadastrado',
                    'phone.required' => 'Informe o telefone',
                    'phone.unique' => 'Telefone já cadastrado'
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
             * Data
             */
            $seller->name = $request->name;
            $seller->email = $request->email;
            $seller->phone = $request->phone;
            $seller->document = $request->document;

            /**
             * Cover
             */
            if ($request->hasFile('cover')) {
                /**
                 * Old
                 */
                if ($seller->cover) {
                    /**
                     * Path
                     */
                    $path = public_path($seller->cover);

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
                    public_path('uploads/sellers'),

                    /**
                     * Name
                     */
                    $coverName
                );

                /**
                 * Data
                 */
                $seller->cover = "/uploads/sellers/{$coverName}";
            }

            /**
             * Save
             */
            $seller->save();

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
                "Atualizou o usuário ID :: {$seller->id}"
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
                'message' => 'Vendedor atualizado!'
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
             * Seller
             */
            $seller = Seller::find($id);

            /**
             * Delete
             */
            $seller->delete();

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
                "Removeu o usuário ID :: {$seller->id}"
            );

            /**
             * Triggers
             */
            return [
                /**
                 * Message
                 */
                'message' => 'Vendedor removido com sucesso!'
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
