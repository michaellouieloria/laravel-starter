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

	public function postIndex()
	{
        // Declare the rules for the form validation
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'recaptcha_response_field' => 'required|recaptcha'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $data = array(
                        'name' => Input::get('name'),
                        'email' => Input::get('email'),
                        'content' => Input::get('message')
                    );

            //Send email
            Mail::send('emails.contact', $data, function($message)
            {
                $message->from(Config::get('app.contact_email'), Input::get('name'));
                $message->to(Config::get('app.send_email'))->subject('BicolIT');

                // Redirect to the contact us page
                return Redirect::to('contact-us')->with('success', Lang::get('contact/messages.send.success'));
            });
        }

        // Form validation failed
        return Redirect::to('contact-us')->withInput()->withErrors($validator);
	}
}
