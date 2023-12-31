<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{__('messages.title')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body dir="{{(App::isLocale('ar')?'rtl':'ltr')}}">


<div class="container ">
<div class="py-5">
    <a  class="btn btn-primary rounded"href="{{laravelLocalization::getLocalizedURL('ar')}}">عربي</a>
    <a  class="btn btn-primary rounded"href="{{laravelLocalization::getLocalizedURL('en')}}">English</a>
</div>
  <h2> {{__('messages.Add Car')}}</h2>
  <form action="{{url('addCar')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">{{__('messages.cartitle')}}:</label>
      <input type="text" class="form-control" id="title" placeholder="{{__('messages.cartitplaceholder')}}" value="{{old('carTitle')}}" name="carTitle">
    </div>
    @error('carTitle')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror()
    <div class="form-group">
      <label for="price">{{__('messages.price')}}:</label>
      <input type="number" class="form-control" id="price" value="{{old('price')}}"  placeholder={{__('messages.priceplaceholder')}} name="price">
    </div>
    @error('price')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror()
    <div class="form-group">
        <label for="description">{{__('messages.description')}}:</label>
        <textarea class="form-control" rows="5"  value="{{old('description')}}"id="description" placeholder="{{__('messages.descriptionplaceholder')}}" name ="description">{{old('description')}}</textarea>
      </div>
      @error('description')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror()
      <div class="form-group">
      <label for="image">{{__('messages.image')}}:</label>
      <input type="file" class="form-control" id="image"  placeholder="" name="image" value="{{old('image')}}">
    </div>
    @error('image')
						<div class="alert alert-danger">{{$message}}</div>
						@enderror()

            <div class="form-group"> </div>
    <div class="checkbox">
     <label>{{__('messages.published')}}</label><input type="checkbox" name="published" value="published">
    </div>
    @error('published')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror()
    <div class="form-group">
            <label for="categories">{{__('messages.categories')}}</label>
            <select name="category_id" id="">
                <option value="">{{__('messages.selectCat')}}</option>
                
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->categoryName}}</option>
                @endforeach
</select>
        </div>
    <button   class="btn btn-primary rounded" type="submit" class="btn btn-default">{{__('messages.add')}}</button>
  </form>
</div>

</body>
</html>
