<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Category;
use App\CategoryType;
use Intervention\Image\Facades\Image;
use Auth;
use Cart;
use App\Http\Requests;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AdvertiserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
class AdvertisesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	public function index()
	{
      $users=User::count();
		$categories = Category::orderBy('id', 'asc')->get();
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
	public function create(Request $request)
	{
      $users=User::count();
    $categories = Category::orderBy('id', 'asc')->get();
		$advertisement = CategoryType::orderBy('id', 'DESC')->paginate(5);
        return view('advertisement.create',compact('advertisement','categories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
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
   $advertisement ->user_id=$request->input('user_id');
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
   flash()->success('Advert Created!');
   //flash()->success('Advert Created!');
   return redirect()->route('advertisement.show', [$advertisement]);
}

    public function edit($id)
{
  $categories = Category::orderBy('id', 'desc')->get();

   $advertisement = CategoryType::findOrFail($id);

   return view('advertisement.edit', compact('advertisement','categories'));

   $advertisement = CategoryType::all($id);

   return view('advertisement.edit', compact('advertisement'));
}
public function show($id)
{
      
   $advertisement = CategoryType::findOrFail($id);
   $users = User::join("category_types","category_types.user_id","=","users.id")->where('category_types.id','=',$id)->get();
   
   return view('advertisement.show', compact('advertisement','users','cart'));	
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
   $advertisement ->user_id=$request->input('user_id');
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
   //flash()->success('image edited!');
   return view('marketingimage.edit', compact('marketingImage'));
}

public function cart() {
    if (Request::isMethod('post')) {
        $product_id = Request::get('product_id');
        $product = CategoryType::find($product_id);
        Cart::add(array('id' => $product_id, 'name' => $product->ads_title, 'qty' => 1, 'price' => $product->ads_price));
    }

    $cart = Cart::content();

    return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
}    
}
