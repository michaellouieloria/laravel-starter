<?php

class PostsTableSeeder extends Seeder {

    protected $content = 'Test Content';

    public function run()
    {
        $user = User::where('username', 'admin')->first();

        $data = [
            [
                    'user_id' => $user->id,
                    'title' => 'Lorem ipsum dolor sit amet',
                    'slug' => 'lorem-ipsum-dolor-sit-amet',
                    'content' => $this->content,
                    'meta_title' => 'meta_title1',
                    'meta_description' => 'meta_description1',
                    'meta_keywords' => 'meta_keywords1',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
            ],
            [
                    'user_id' => $user->id,
                    'title' => 'Vivendo suscipiantur vim te vix',
                    'slug' => 'vivendo-suscipiantur-vim-te-vix',
                    'content' => $this->content,
                    'meta_title' => 'meta_title2',
                    'meta_description' => 'meta_description2',
                    'meta_keywords' => 'meta_keywords2',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
            ],
            [
                    'user_id' => $user->id,
                    'title' => 'In iisque similique reprimique eum',
                    'slug' => 'in-iisque-similique-reprimique-eum',
                    'content' => $this->content,
                    'meta_title' => 'meta_title3',
                    'meta_description' => 'meta_description3',
                    'meta_keywords' => 'meta_keywords3',
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
            ],
        ];
        
        foreach ($data as $datum)
        {
            $count = Post::where('user_id', $user->id)->where('title', $datum['title'])->count();
            if (!$count)
            {
                Post::create($datum);
            }
        }
    }

}
