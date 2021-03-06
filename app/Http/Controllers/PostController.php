<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destory', 'imageUpload', 'comment', 'zan', 'unzan']]);
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics  = $this->postRepository->getAllTopics();
        $columns = $this->postRepository->getColumns();
        return view('post.create', compact('topics', 'columns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $topics = $this->postRepository->normalizeTopic($request->get('topic'));
        $data = [
            'column'  => $request->get('column'),
            'title'   => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => Auth::user()->id,
        ];
        $post = $this->postRepository->create($data);
        $post->topics()->attach($topics);
        return redirect()->route('post.show', [$post->id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post    = $this->postRepository->byId($id);
        $post->increment('views');
        $columns = $this->postRepository->getColumns();
        return view('post.show', compact('post', 'columns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post    = $this->postRepository->byId($id);
        /*if (!Auth::user()->owns($post)){
            return back();
        }*/
        $this->authorize('update', $post);
        $topics  = $this->postRepository->getAllTopics();
        $columns = $this->postRepository->getColumns();
        $select_topics = $this->postRepository->dealSelectTopics($post->topics);
        return view('post.edit', compact('post', 'topics', 'columns', 'select_topics'));
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
        $post    = $this->postRepository->byId($id);
        /*if (!Auth::user()->owns($post)){
            return back();
        }*/
        $this->authorize('update', $post);
        $topics = $this->postRepository->normalizeTopic($request->get('topic'));
        $post->update([
            'column'  => $request->get('column'),
            'title'   => $request->get('title'),
            'content' => $request->get('content'),
        ]);
        $post->topics()->sync($topics);
        return redirect()->route('post.show', [$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->byId($id);
        /*if (!Auth::user()->owns($post)){
            return back();
        }*/
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('post.column', ['column' => $post->column]);
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
        $result = $this->postRepository->searchTopics($request->get('keyword'));
        return $this->returnMsg(0, $result, 'success');
    }

    public function column($column)
    {
        $posts = $this->postRepository->getPostsByColumn($column);
        $columns = $this->postRepository->getColumns();
        return view('post.column' , compact('posts', 'columns'));
    }

    public function comment(Request $request, $post_id)
    {
        $this->validate($request, [
            'content' => 'required|min:6',
        ]);

        $this->postRepository->comment(
            [
                'post_id' => $post_id,
                'user_id' => Auth::id(),
                'content' => $request->get('content')
            ]
        );
        return back();
    }

    public function zan($post_id)
    {
        $params = [
            'user_id' => Auth::id(),
            'post_id' => $post_id
        ];
        $this->postRepository->zan($params);
        return back();
    }

    public function unzan($post_id)
    {
        $post = $this->postRepository->byId($post_id);
        $post->zan(Auth::id())->delete();
        return back();
    }
}
