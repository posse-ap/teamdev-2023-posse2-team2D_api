<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\Comment;
use App\Models\User;
use App\Models\ItemImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Jsonresponse;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('owner', 'itemImages')->where('type', 1)->get()->map(function ($item) {
            return $item->toArray();
        });
    
        return response()->json($items);
    
    }

    public function getItemWithRelations($id)
    {
        // $id = $request->route['id'];
        // Itemの情報を取得
        $item = Item::findOrFail($id);
    
        // Itemに紐づくTransactionの情報を取得
        $transactions = DB::table('transactions')->join('users', 'users.id', '=', 'transactions.borrower_user_id')->select('transactions.*', 'users.name')->where('item_id', $id)->get();
        
        $transaction_data = [];
        foreach($transactions as $transaction){
            array_push($transaction_data, [
            'id' => $transaction->id,
            'start_date' => $transaction->start_date,
            'points' => $transaction->points,
            'borrower' => $transaction->name,
            'return_date' => $transaction->end_date,]);
        }
        
        // Itemに紐づくCommentの情報を取得
        $comments = Comment::where('item_id', $id)->get();
        
        $comment_data = [];
        foreach($comments as $comment){
            $user_info = User::find($comment->user_id);
            array_push($comment_data, ["user_id" => $user_info->id, "user_name" => $user_info->name, "img" => $user_info->image, "content" => $comment->content]);
        }
    
        // レスポンスとして返すデータを作成
        $user = User::where('id', $id)->first();

        $item_images = ItemImage::where('item_id', $id)->get();

        $images = [];
        foreach($item_images as $item_image){
            array_push($images, $item_image->image_url);
        }
        // $data = $id;
        $data = [
            'id' => $item->id,
            'price' => $item->points,
            'title' => $item->name,
            'state' => $item->status,
            'ownerInfo' => [
                'id' => $user->id,
                'name' => $user->name,
                'img' => $user->image,
            ],
            'img' => $images,
            'comments' => $comment_data,
            'transactions' => $transaction_data,
        ];
    
        return response()->json($data);
    }
}


