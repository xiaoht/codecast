<?php

namespace App\Repositories;

use App\Http\Models\Comment;
use App\Http\Models\Post;
use App\Http\Models\Topic;
use App\Http\Models\Zan;

class PostRepository
{
    /**
     * 通过id获取文章信息
     * @param $id
     * @return mixed
     */
    public function byId($id)
    {
        $post    = Post::where('id', $id)->with(['topics', 'user', 'comments'])->first();
        return $post;
    }

    /**
     * 创建文章
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return Post::create($attributes);
    }

    /**
     * 所有话题
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllTopics()
    {
        return Topic::all();
    }

    /**
     * 处理话题
     * @param $topics
     * @return array
     */
    public function normalizeTopic($topics)
    {
        $topics = explode(',', $topics);
        return collect($topics)->map(function ($topic) {
            if ( strpos($topic, '/**') === false ) {
                return (int) $topic;
            }
            $newTopic = Topic::create(['name' => explode('/', $topic)[0]]);
            return $newTopic->id;
        })->toArray();
    }

    /**
     * 通过关键字查找话题
     * @param $keyword
     * @return array
     */
    public function searchTopics($keyword)
    {
        $result = [];
        if ($keyword){
            $topics = Topic::where('name', 'like', '%'.$keyword.'%')->get();
            $result[] = ['name' => $keyword, 'value' => $keyword.'/**'];
        }else{
            $topics = $this->getAllTopics();
        }

        foreach ($topics as $v){
            $result[] = array(
                'name'  => $v['name'],
                'value' => $v['id']
            );
        }
        return $result;
    }

    /**
     * 专栏列表
     * @return array
     */
    public function getColumns()
    {
        $data = [
            '提问',
            '分享',
            '讨论',
            '建议',
            '公告',
            '动态',
        ];
        return $data;
    }

    /**
     * 处理选中的话题
     * @param $topics
     * @return array
     */
    public function dealSelectTopics($topics)
    {
        $data = array();
        foreach ($topics as $topic){
            $data[] = $topic->id;
        }
        return $data;
    }

    /**
     * 通过专栏获取文章
     * @param $column
     * @return mixed
     */
    public function getPostsByColumn($column)
    {
        $posts = Post::where('column' , $column)->orderBy('created_at' ,  'desc')->with('user')->paginate(10);
        return $posts;
    }

    /**
     * 提交评论
     * @param array $attributes
     */
    public function comment(array $attributes)
    {
        Comment::create($attributes);
    }

    /**
     * 点赞
     * @param array $attributes
     */
    public function zan(array $attributes)
    {
        Zan::firstOrCreate($attributes);
    }
}