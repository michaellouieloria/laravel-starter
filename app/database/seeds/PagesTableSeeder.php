<?php

class PagesTableSeeder extends Seeder {

    public function run()
    {
        $data = [
            [
                'title'      => 'Home',
                'slug'       => 'home',
                'content'    => '    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>',
                'meta_title' => 'Home',
                'meta_description' => 'Home',
                'meta_keywords' => 'home',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title'      => 'About',
                'slug'       => 'about',
                'content'    => 'About',
                'meta_title' => 'About',
                'meta_description' => 'about',
                'meta_keywords' => 'about',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
            [
                'title'      => 'Contact Us',
                'slug'       => 'contact-us',
                'content'    => 'Contact Us',
                'meta_title' => 'Contact Us',
                'meta_description' => 'contact us',
                'meta_keywords' => 'contact us',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]
        ];

        foreach ($data as $datum)
        {
            $count = Page::where('slug', $datum['slug'])->count();
            if (!$count)
            {
                Page::create($datum);
            }
        }
    }
    
}
