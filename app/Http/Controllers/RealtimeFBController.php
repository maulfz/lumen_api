<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class RealtimeFBController extends Controller
{
    public function showAllDatas()
    {
        $factory = (new Factory())
            ->withDatabaseUri('https://testlumen-7dc5e-default-rtdb.firebaseio.com');
        $realtimeDatabase = $factory->createDatabase();
        $reference = $realtimeDatabase->getReference('published_articles');
        $snapshot = $reference->getSnapshot()->getValue();
        return response()->json($snapshot);
    }

    public function showOneData($id)
    {
        $factory = (new Factory())
            ->withDatabaseUri('https://testlumen-7dc5e-default-rtdb.firebaseio.com');
        $realtimeDatabase = $factory->createDatabase();
        $reference = $realtimeDatabase->getReference('published_articles/'.$id);
        $snapshot = $reference->getSnapshot()->getValue();
        if(!$snapshot) return $this->customResponse('Published article not found!', 404);
        return response()->json($snapshot);
    }

    public function create(Request $request)
    {
        $factory = (new Factory())
            ->withDatabaseUri('https://testlumen-7dc5e-default-rtdb.firebaseio.com');
        $realtimeDatabase = $factory->createDatabase();
        $newBook = $realtimeDatabase
        ->getReference('published_articles')
        ->push($request->all());

        return response()->json($newBook->getvalue());
    }

    public function update($id, Request $request)
    {
        $factory = (new Factory())
            ->withDatabaseUri('https://testlumen-7dc5e-default-rtdb.firebaseio.com');
        $realtimeDatabase = $factory->createDatabase();
        $reference = $realtimeDatabase->getReference('published_articles/'.$id);
        if(!$reference->getValue()) return $this->customResponse('Published article not found!', 404);

        $updates = [
            'published_articles/'.$id => $request->all(),
        ];
        $realtimeDatabase->getReference()->update($updates);

        return response()->json($reference->getValue());
    }

    public function delete($id)
    {
        $factory = (new Factory())
            ->withDatabaseUri('https://testlumen-7dc5e-default-rtdb.firebaseio.com');
        $realtimeDatabase = $factory->createDatabase();
        $reference = $realtimeDatabase->getReference('published_articles/'.$id);
        if(!$reference->getValue()) return $this->customResponse('Published article not found!', 404);
        $realtimeDatabase->getReference('published_articles/'.$id)->remove();

        return $this->customResponse('Deleted successfully', 200);
    }

    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }
}
?>