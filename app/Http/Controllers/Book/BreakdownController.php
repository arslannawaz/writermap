<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Breakdown;
use Illuminate\Http\Request;

class BreakdownController extends Controller
{
    public function update($book_id, $breakdown_id)
    {
        /** @var Book $book */
        $breakdown = Breakdown::find($breakdown_id);

        $field = request('field');
        if (request('index') === null) {
            $breakdown->$field = [request('value')];
        } else {
            $content = json_decode($breakdown->$field, true);

            if (empty(request('value'))) {
                unset($content[request('index')]);
            } else {
                $content[request('index')] = request('value');
            }

            $breakdown->$field = $content;
        }

        $breakdown->save();

        return $breakdown;
    }
}
