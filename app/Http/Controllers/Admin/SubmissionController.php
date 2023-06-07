<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Subscription;
use App\Models\Post;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SubmissionExport;

class SubmissionController extends Controller
{
    public function index(){
        
        $post = null;
        if (isset(request()->all()['post_id'])) {
            $post = Post::where('id', request()->all()['post_id'])->with('translations')->first();
            
            $submissions = Submission::orderBy('created_at', 'desc')->where('post_id', request()->all()['post_id'])->with('post')->paginate(10);
        }
        else {
            $submissions = Submission::orderBy('created_at', 'desc')->with('post')->paginate(10);
        }
        $subscribers = Subscription::orderBy('created_at')->get();
        return view('admin.submissions.index', compact(['submissions', 'post']));

    }

    public function show($id){
        $submission = Submission::orderBy('created_at', 'desc')->with('post', 'post.translations', 'post.parent', 'post.parent.translations')->where('id', $id)->first();
        $submission->seen = 1;
        $submission->save();
        
        return view('admin.submissions.show', compact(['submission']));

    }
    public function destroy($id){
        Submission::where('id', $id)->delete();

        
        return back();

    }


    public function export($id){
        return Excel::download(new SubmissionExport($id), 'submission.xlsx');
    }

}
