<?php

class PageController extends \BaseController {

	public function create()
	{
		return View::make('edit');
	}

    public function createMake()
    {
        $userid = Auth::id();
        $name = Input::get('name');
        $title = Input::get('title');
        $about = Input::get('about');
        $store_url = Input::get('store_url');
        $phone_color = Input::get('phone_color');
        $text_color = Input::get('text_color');
        $copyright = Input::get('copyright');
        $imageMIME = Input::file('image');
        $backgroundMIME = Input::file('background');
        $background_color = Input::get('background_color');

        $info = [
            'name'        => $name,
            'title'       => $title,
            'about'       => $about,
            'phone_color' => $phone_color,
            'text_color'  => $text_color,
            'copyright'   => $copyright,
            'screenshot'  => $imageMIME,
            'background'  => $backgroundMIME,
            'store_url'   => $store_url,
        ];
        $validator = Validator::make($info,
            array(
                'name'        => 'required|min:3|max:255|unique:pages|alpha_dash',
                'title'       => 'required',
                'about'       => 'required',
                'phone_color' => 'required',
                'text_color'  => 'required',
                'copyright'   => 'required',
                'screenshot'  => 'required|image',
                'background'  => 'image',
                'store_url'   => 'url',
            )
        );

        if ($validator->fails())
        {
            //$validator->getMessageBag()->add('name', 'Name already exists!');
            //dd($validator->messages());
            return Redirect::to('/create')->withInput()->withErrors($validator);
        }

        if(Input::get('back_option') == 'color')
        {
            if(substr($background_color, 0, 1) === '#')
            {
                $background = $background_color;
            }
            else
            {
                $background = '#'.$background_color;
            }
        }
        else
        {
            $background = md5(uniqid('backgroundID', true)).'.'.Input::file('background')->getClientOriginalExtension();
            Input::file('background')->move(public_path().'/backgrounds', $background);
        }

        $imageID = md5(uniqid('imageID', true)).'.'.Input::file('image')->getClientOriginalExtension();

        Input::file('image')->move(public_path().'/screens', $imageID);

        $optionals = ['image2', 'image3', 'image4'];
        foreach($optionals as $o)
        {
            if(Input::hasFile($o))
            {
                $i = md5(uniqid('imageID', true)).Input::file($o)->getClientOriginalExtension();
                Input::file($o)->move(public_path().'/screens', $i);
                $imageID .= ','.$o;
            }
        }

        $page = new Page;
        $page->user_id     = $userid;
        $page->name        = strtolower($name);
        $page->title       = $title;
        $page->about       = $about;
        $page->image       = $imageID;
        $page->background  = $background;
        $page->copyright   = $copyright;
        $page->store_url   = $store_url;
        $page->phone_color = $phone_color;
        $page->text_color  = $text_color;
        $page->save();

        $pagesCount = Page::where('user_id', '=', $userid)->count();

        User::where('id', '=', $userid)->update(array('pages' => $pagesCount));

        return Redirect::to('/'.$name);
    }

    public function view($name){
        $page = Page::where('name', '=', $name)->first();
        if( ! $page)
        {
            return Response::make('404 Page Not Found!');
        }
        $user = User::where('id', '=', $page->user_id)->first();

        if ( ! $user->subscribed())
        {
            return Response::make('404 Page Not Found!');
        }

        return View::make('app', $page);
    }

}