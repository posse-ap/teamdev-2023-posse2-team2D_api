<?php

// BookmarkController.php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function bookmark(Request $request, $id)
    {
        Bookmark::create([
            'user_id'     => Auth::id(),
            'item_id'        => $request-> id
        ]);
    
        return response()->json(['success' => true]);
    }

    public function unbookmark(Request $request, $id)
    {
        $bookmark = Bookmark::where('user_id', Auth::id())
        ->where('item_id', $request->id)
        ->first();

        if ($bookmark) {
        $bookmark->delete();
        return response()->json(['success' => true]);
        } else {
        return response()->json(['success' => false]);
        }
    }
}
