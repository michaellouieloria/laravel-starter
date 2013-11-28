<?php

class FeedController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Feed.
	 *
	 * @return Feed
	 */
	public function getIndex()
	{
        // creating rss feed with our most recent 20 posts    
        $posts = Post::orderBy('created_at', 'DESC')->take(20)->get();

        $feed = Feed::make();

        // set your feed's title, description, link, pubdate and language
        $feed->title = 'BicolIT';
        $feed->description = 'BicolIT Feed';
        $feed->logo = asset('assets/ico/apple-touch-icon-144-precomposed.png');
        $feed->link = URL::to('feed');
        $feed->pubdate = $posts[0]->created_at;
        $feed->lang = 'en';

        foreach ($posts as $post)
        {
            // set item's title, author, url, pubdate and description
            $feed->add($post->title, $post->author->username, URL::to($post->slug), $post->created_at, $post->content);
        }

        // show your feed (options: 'atom' (recommended) or 'rss')
        return $feed->render('atom');
	}
}
