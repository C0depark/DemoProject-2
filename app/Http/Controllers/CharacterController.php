<?php

namespace App\Http\Controllers;

use App\Models\CharacterModel;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function getCharacters(CharacterModel $quoteModel, Request $request): string {
        return $quoteModel->getCharacters($request->query('search'))->getBody()->getContents();
    }
}
