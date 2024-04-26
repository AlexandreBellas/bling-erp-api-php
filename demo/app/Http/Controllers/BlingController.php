<?php

namespace App\Http\Controllers;

use AleBatistella\BlingErpApi\Bling;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BlingController extends Controller
{
    private string $tmpFile = "access.json";

    public function renderHtmlPage()
    {
        return view('bling');
    }

    public function receiveCredentials(Request $request)
    {
        $clientId = $request->input('client_id');
        $clientSecret = $request->input('client_secret');

        if (is_null($clientId) || is_null($clientSecret)) {
            return response()->json([
                'message' => 'Envie o clientId e o clientSecret.'
            ], 400);
        }

        $baseUrl = 'https://www.bling.com.br';
        $endpoint = 'Api/v3/oauth/authorize';
        $state = "1234567890";
        $redirectUri = 'http://localhost:8000/auth';

        Storage::put($this->tmpFile, json_encode([
            'clientId' => $clientId,
            'clientSecret' => $clientSecret
        ]));

        return response()->redirectTo(
            "$baseUrl/$endpoint?response_type=code&client_id=$clientId&state=$state&redirect_uri=$redirectUri"
        );
    }

    public function showAuthData(Request $request)
    {
        $code = $request->query('code');

        if (is_null($code)) {
            return response()->json([
                'message' => 'É necessário que seja enviado o "code".'
            ], 400);
        }

        @[
            'clientId' => $clientId,
            'clientSecret' => $clientSecret
        ] = json_decode(Storage::get($this->tmpFile), true);
        Storage::delete($this->tmpFile);

        if (is_null($clientId) || is_null($clientSecret)) {
            return response()->json([
                'message' => 'clientId ou clientSecret não encontrados.'
            ], 500);
        }

        $authResponse = Http::asForm()
            ->withBasicAuth($clientId, $clientSecret)
            ->post('https://www.bling.com.br/Api/v3/oauth/token', [
                'grant_type' => 'authorization_code',
                'code' => $code,
            ]);

        if (!$authResponse->ok()) {
            return response()->json([
                'message' => 'Não foi possível autenticar no Bling.'
            ], 500);
        }

        $authResponseContent = $authResponse->json();

        // $accessToken é o que você precisa fornecer para a biblioteca! 😄
        @['access_token' => $accessToken] = $authResponseContent;
        if (is_null($accessToken)) {
            return response()->json([
                'message' => 'Não foi possível obter o token de requisição.'
            ], 500);
        }

        $bling = new Bling($accessToken);
        $products = $bling->produtos->get();

        return response()->json([
            ...$authResponseContent,
            'products' => $products->toArray()
        ]);
    }
}
