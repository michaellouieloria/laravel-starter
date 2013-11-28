<?php

class SitemapController extends BaseController {

    public function __construct()
    {
        parent::__construct();
    }
    
	/**
	 * Sitemap.
	 *
	 * @return Sitemap
	 */
	public function getIndex()
	{
        //get posts
        $posts = Post::orderBy('created_at', 'DESC')->get();
        //get pages
        $pages = Page::get();

        $sitemap = App::make("sitemap");

        foreach ($pages as $page)
        {
            // set item's url, date, priority, freq
            $sitemap->add(URL::to($page->slug), $page->updated_at, 'monthly', 1);
        }

        foreach ($posts as $post)
        {
            // set item's url, date, priority, freq
            $sitemap->add(URL::to($post->slug), $post->updated_at, 'never', 0.5);
        }

        // show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $sitemap->render('xml');
	}
}
