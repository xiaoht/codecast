<?php

namespace App\Http\Controllers;

use App\Http\Models\Post;
use App\Http\Models\Topic;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth' , ['only' => ['create' , 'store' , 'edit' , 'update' , 'destory']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::all();
        return view('post.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $topics = explode(',', $request->get('topic'));
        $topics = $this->normalizeTopic($topics);
        $data = [
            'title'   => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => Auth::user()->id,
        ];
        $post = Post::create($data);
        $post->topics()->attach($topics);
        return redirect()->route('post.show', [$post->id]);
    }

    public function normalizeTopic(array $topics)
    {
        return collect($topics)->map(function ($topic) {
            if ( strpos($topic, '/**') === false ) {
                return (int) $topic;
            }
            $newTopic = Topic::create(['name' => explode('/', $topic)[0]]);
            return $newTopic->id;
        })->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->with('topics')->first();
        return view('post.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 图片上传
     * @param Request $request
     * @return mixed
     */
    public function imageUpload(Request $request)
    {
        $path = $request->file('file')->storePublicly(md5(Auth::id() . time()));
        $data['src'] = asset('storage/'. $path);
        return $this->returnMsg(0,$data,'');
    }

    public function topics(Request $request)
    {
        $result = [];
        if ($request->get('keyword')){
            $topics = Topic::where('name', 'like', '%'.$request->get('keyword').'%')->get();
            $result[] = ['name' => $request->get('keyword'), 'value' => $request->get('keyword').'/**'];
        }else{
            $topics = Topic::all();
        }

        foreach ($topics as $v){
            $result[] = array(
                'name'  => $v['name'],
                'value' => $v['id']
            );
        }
        return $this->returnMsg(0, $result, 'success');
    }
}
