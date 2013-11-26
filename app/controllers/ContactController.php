<?php

class ContactController extends BaseController {

    /**
     * Page Model
     * @var Page
     */
    protected $post;

    /**
     * Inject the models.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        parent::__construct();

        $this->page = $page;
    }
    
	/**
	 * View home.
	 *
	 * @return View
	 */
	public function getIndex()
	{
        $page = $this->page->where('slug', '=', 'contact-us')->first();
        
		// Show the page
		return View::make('site/contact/index', compact('page'));
	}
}
