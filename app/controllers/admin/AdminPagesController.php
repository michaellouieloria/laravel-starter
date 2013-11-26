<?php

class AdminPagesController extends AdminController {


    /**
     * Page Model
     * @var Page
     */
    protected $page;

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
     * Show a list of all the pages.
     *
     * @return View
     */
    public function getIndex()
    {
        // Title
        $title = Lang::get('admin/pages/title.page_management');

        // Grab all the pages
        $pages = $this->page;

        // Show the page
        return View::make('admin/pages/index', compact('pages', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getShow($post)
	{
        // redirect to the frontend
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($page)
	{
        // Title
        $title = Lang::get('admin/pages/title.page_update');

        // Show the page
        return View::make('admin/pages/create_edit', compact('page', 'title'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($post)
	{

        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the page post data
            $post->title            = Input::get('title');
            $post->content          = Input::get('content');
            $post->meta_title       = Input::get('meta-title');
            $post->meta_description = Input::get('meta-description');
            $post->meta_keywords    = Input::get('meta-keywords');

            // Was the page post updated?
            if($post->save())
            {
                // Redirect to the new page page
                return Redirect::to('admin/pages/' . $post->id . '/edit')->with('success', Lang::get('admin/pages/messages.update.success'));
            }

            // Redirect to the pages post management page
            return Redirect::to('admin/pages/' . $post->id . '/edit')->with('error', Lang::get('admin/pages/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/pages/' . $post->id . '/edit')->withInput()->withErrors($validator);
	}

    /**
     * Show a list of all the pages formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function getData()
    {
        $pages = Page::select(array('pages.id', 'pages.title', 'pages.created_at'));

        return Datatables::of($pages)


        ->add_column('actions', '<a href="{{{ URL::to(\'admin/pages/\' . $id . \'/edit\' ) }}}" class="btn btn-default btn-xs iframe" >{{{ Lang::get(\'button.edit\') }}}</a>')

        ->remove_column('id')

        ->make();
    }

}