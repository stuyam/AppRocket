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
        $imageMIME = Input::file('image');
        $backgroundMIME = Input::file('background');

        $info = [
            'name'        => $name,
            'title'       => $title,
            'about'       => $about,
            'phone_color' => $phone_color,
            'text_color'  => $text_color,
            'screenshot'  => $imageMIME,
            'background'  => $backgroundMIME
        ];
        $validator = Validator::make($info,
            array(
                'name'        => 'required|min:3|max:255|unique:pages',
                'title'       => 'required',
                'about'       => 'required',
                'phone_color' => 'required',
                'text_color'  => 'required',
                'screenshot'  => 'required|mimes:jpeg,png,gif,jpg',
                'background'  => 'required|mimes:jpeg,png,gif,jpg'
            )
        );

        if ($validator->fails())
        {
            return Response::make($validator->messages());
        }

        $imageID = md5(uniqid('imageID', true)).Input::file('image')->getClientOriginalExtension();
        $backgroundID = md5(uniqid('backgroundID', true)).Input::file('background')->getClientOriginalExtension();

        Input::file('image')->move(public_path().'/screens', $imageID);
        Input::file('background')->move(public_path().'/backgrounds', $backgroundID);

        if(Input::hasFile('image2'))
        {
            $image2ID = md5(uniqid('imageID', true)).Input::file('image2')->getClientOriginalExtension();
            Input::file('image2')->move(public_path().'/screens', $image2ID);
            $imageID = $imageID.','.$image2ID;
        }
        if(Input::hasFile('image3'))
        {
            $image3ID = md5(uniqid('imageID', true)).Input::file('image3')->getClientOriginalExtension();
            Input::file('image3')->move(public_path().'/screens', $image3ID);
            $imageID = $imageID.','.$image3ID;
        }
        if(Input::hasFile('image4'))
        {
            $image4ID = md5(uniqid('imageID', true)).Input::file('image4')->getClientOriginalExtension();
            Input::file('image4')->move(public_path().'/screens', $image4ID);
            $imageID = $imageID.','.$image4ID;
        }

        $page = new Page;
        $page->user_id     = $userid;
        $page->name        = $name;
        $page->title       = $title;
        $page->about       = $about;
        $page->image       = $imageID;
        $page->background  = $backgroundID;
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
        return View::make('app', $page);
    }

}