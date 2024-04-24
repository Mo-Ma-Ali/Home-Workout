<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
//    public function chat(Request $request)
//    {
//        $message =$request->input('message');
//        $client = new Client();
//        $url = 'https://api.openai.com/v1/chat/completions';
//        $headers = [
//            'Content-Type' => 'application/json',
//           'Authorization' => 'Bearer'.env('OPENAI_API_KEY'),
//        ];
//        $body = [
//            'model' => 'gpt-3.5-turbo',
//            'messages' => [['role' => 'user', 'content' => $message]],
//        ];
//        $response = $client->post(
//            $url, [
//            'headers' => $headers,
//            'json' => $body,
//        ]);
//        $result = json_decode($response->getBody()->getContents(), true);
//        return response()->json($result['choices'][0]['message']['content']);
//    }
    public function chat(Request $request){

        $yourApiKey ="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";
        $client = \OpenAI::client($yourApiKey);
        $result = $client->completions()->create([
            'model' => 'gpt-3.5-turbo',
            'prompt' => $request->text.'give me the answer in jason form',
            'max_tokens'=>3500,
        ]);
        echo $result['choices'][0]['text'];
    }
}


