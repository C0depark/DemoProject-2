<?php

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class CharacterModel extends Model
{
    use HasFactory;

    private string $uri = "https://the-one-api.dev/v2/character";
    private array $options = [
        'headers' => [
            'Authorization' => 'Bearer P4aLTz9GpejXgF37vdB8'
        ]
    ];
    protected Client $client;

    function __construct(Client $client, array $attributes = [])
    {
        $this->client = $client;

        parent::__construct($attributes);
    }

    public function getCharacters(string $search = null): Response {
        $uri = $this->uri . '?limit=100';

        if (!empty($search)) {
            $uri .= "&name=/{$search}/i";
        }

        Log::debug("URI: {$uri} - SEARCH: {$search}");

        return $this->client->request('GET', $uri, $this->options);
    }
}
