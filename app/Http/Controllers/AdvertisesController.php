<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
<<<<<<< HEAD
use Illuminate\Support\Facades\File;
=======
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
use App\Category;
use App\CategoryType;
use Intervention\Image\Facades\Image;
use Auth;
use App\Http\Requests;
use App\Http\Requests\AdvertiserRequest;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Pagination\Paginator;
=======

>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

class AdvertisesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
<<<<<<< HEAD
		$categories = Category::orderBy('id', 'desc')->get();
=======
		$categories = Category::orderBy('id', 'asc')->get();
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
		//$advertisement = Advertise::all();
		//$categories = Category::lists('name');
		//$types = Type::pluck('ads_type');
		//$query = DB::select('select $name from category');
		/*if ($categories == 'Appliances')
		{
			$types = Type::lists(array('ads_type'=>'Toys','Electronics'));
		}
		elseif ($categories == 'Real Estate')
		{
			$types = Type::lists(array('ads_type'=>'Mortgages','Land'));
		
		}*/
		
		return View('advertisement.index',compact('categories'));
	}
<<<<<<< HEAD
	public function create(Request $request)
	{
		$advertisement = CategoryType::orderBy('id', 'DESC')->paginate(5);
        return view('advertisement.create',compact('advertisement'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
=======
	public function create()
	{
		//$categories = Category::orderBy('name', 'asc')->get();
		
		//return View('advertisement.create',compact('categories'));
	}
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
	public function formatCheckboxValue($advertisement)
{

   $advertisement->is_active = ($advertisement->is_active == null) ? 0 : 1;
   $advertisement->is_featured = ($advertisement->is_featured == null) ? 0 : 1;
}

    //Save advert to the db
public function store(AdvertiserRequest $request)
{
   //create new instance of model to save from form

   //$category =Category::lists('name','id')->get();
   $advertisement = new CategoryType([
       'ads_title'        => $request->get('ads_title'),
       'category_id'        => $request->get('category_id'),
       'type_id'        => $request->get('type_id'),
       'ads_content'        => $request->get('ads_content'),
       'ads_price'        => $request->get('ads_price'),
       'ads_image'        => $request->get('ads_image'),
       'image_extension'   => $request->file('image')->getClientOriginalExtension(),
       'is_active'         => $request->get('is_active'),
       'is_featured'       => $request->get('is_featured'),

   ]);

   //define the image paths

   $destinationFolder = '/uploadedimage/Advertising/';
   $destinationThumbnail = '/uploadedimage/Advertising/thumbnails/';
   $destinationMobile = '/uploadedimage/advertising/mobile/';

   //assign the image paths to new model, so we can save them to DB

   $advertisement->image_path = $destinationFolder;

   // format checkbox values and save model

   $this->formatCheckboxValue($advertisement);
   $advertisement->save();

   //parts of the image we will need

   $file = Input::file('image');

   $imageName = $advertisement->ads_image;
   $extension = $request->file('image')->getClientOriginalExtension();

   //create instance of image from temp upload

   $image = Image::make($file->getRealPath());

   //save image with thumbnail

   $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
       ->resize(160, 160)
       // ->greyscale()
       ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

   // Process the uploaded image, add $model->attribute and folder name

<<<<<<< HEAD
   flash()->success('Advert Created!');
=======
   //flash()->success('Advert Created!');
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2

   return redirect()->route('advertisement.show', [$advertisement]);
}

    public function edit($id)
{
<<<<<<< HEAD
  $categories = Category::orderBy('id', 'desc')->get();

   $advertisement = CategoryType::findOrFail($id);

   return view('advertisement.edit', compact('advertisement','categories'));
=======

   $advertisement = CategoryType::all($id);

   return view('advertisement.edit', compact('advertisement'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
}
public function show($id)
{

   //$ads = CategoryType::all();
   $advertisement = CategoryType::findOrFail($id);

   return view('advertisement.show', compact('advertisement'));	
}
public function update($id, EditImageRequest $request)
{
   $advertisement = CategoryType::lists($id);

   $advertisement->ads_title = $request->get('ads_title');
   $advertisement->category_id = $request->get('category_id');
   $advertisement->type_id = $request->get('type_id');
   $advertisement->ads_content = $request->get('ads_content');
   $advertisement->ads_price = $request->get('ads_price');
   $advertisement->is_active = $request->get('is_active');
   $advertisement->is_featured = $request->get('is_featured');

   $this->formatCheckboxValue($advertisement);
   $advertisement->save();

   if ( ! empty(Input::file('image'))){

       $destinationFolder = '/uploadedimage/Advertising/';
       $destinationThumbnail = '/uploadedimage/Advertising/thumbnail';

       $file = Input::file('image');

       $imageName = $advertisement->ads_image;
       $extension = $request->file('image')->getClientOriginalExtension();

       //create instance of image from temp upload
       $image = Image::make($file->getRealPath());

       //save image with thumbnail
       $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
           ->resize(60, 60)
           // ->greyscale()
           ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

   }

<<<<<<< HEAD
   flash()->success('advert edited!');
   return view('advertisement.edit', compact('advertisement'));
}
public function destroy($id)
{
   $advertisement = CategoryType::findOrFail($id);
   $thumbPath = $advertisement->image_path.'thumbnails/';

   File::delete(public_path($advertisement->image_path).
                            $advertisement->ads_image . '.' .
                            $advertisement->image_extension);
   File::delete(public_path($thumbPath). 'thumb-' .
                            $advertisement->ads_image . '.' .
                            $advertisement->image_extension);

    CategoryType::destroy($id);

   flash()->success('advert deleted!');

   return redirect()->route('advertisement.create');

=======
   //flash()->success('image edited!');
   return view('marketingimage.edit', compact('marketingImage'));
>>>>>>> 216c04375f6980c3d2ee420ff3a50081e5c5a1c2
}

    
}
